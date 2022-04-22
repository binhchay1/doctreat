<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use App\Exports\StorageHistoryExport;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\OrderLineRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\PromotionRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\UserRepository;
use App\Repositories\InvoiceRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\InvoiceDoctorRepository;
use App\Models\Order;
use App\Models\InvoiceDoctor;
use stdClass;
use Excel;


class AdminController extends Controller
{
    private OrderRepository $orderRepository;
    private ProductRepository $productRepository;
    private OrderLineRepository $orderLineRepository;
    private PaymentRepository $paymentRepository;
    private PromotionRepository $promotionRepository;
    private ScheduleRepository $scheduleRepository;
    private UserRepository $userRepository;
    private InvoiceRepository $invoiceRepository;
    private ServiceRepository $serviceRepository;
    private InvoiceDoctorRepository $invoiceDoctorRepository;

    public function __construct(
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
        OrderLineRepository $orderLineRepository,
        PaymentRepository $paymentRepository,
        PromotionRepository $promotionRepository,
        ScheduleRepository $scheduleRepository,
        UserRepository $userRepository,
        InvoiceRepository $invoiceRepository,
        ServiceRepository $serviceRepository,
        InvoiceDoctorRepository $invoiceDoctorRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->orderLineRepository = $orderLineRepository;
        $this->paymentRepository = $paymentRepository;
        $this->promotionRepository = $promotionRepository;
        $this->scheduleRepository = $scheduleRepository;
        $this->userRepository = $userRepository;
        $this->invoiceRepository = $invoiceRepository;
        $this->serviceRepository = $serviceRepository;
        $this->invoiceDoctorRepository = $invoiceDoctorRepository;
    }

    public function viewDashBoard()
    {
        $products = $this->productRepository->getAll();
        foreach ($products as $product) {
            $orderLine = $this->orderLineRepository->getAllByProductIdInMonth($product->id);
            $totalQuantity = 0;

            foreach ($orderLine as $order) {
                $totalQuantity = $totalQuantity + $order->quantity;
            }

            $product->totalQuantity = $totalQuantity;
            $product->totalPrice = $totalQuantity * $product->price;
        }

        $schedules = $this->scheduleRepository->getAllScheduleInMonth();
        $data['schedule'] = [];
        foreach ($schedules as $schedule) {
            $customer = $this->userRepository->getNameById($schedule->customer_id);
            $doctor = $this->userRepository->getById($schedule->doctor_id);
            $obj = new stdClass();

            $obj->doctor_name = $doctor->name;
            $obj->customer_name = $customer->name;
            $obj->timer = $schedule->date . ' ' . $schedule->hours;

            $data['schedule'][] = $obj;
        }

        $data['product'] = $products;

        return view('admin.home', compact('data'));
    }

    public function orderView(Request $request)
    {
        $filters = [];

        if (isset($request->code)) {
            $filters['code'] = $request->code;
        }

        if (isset($request->name)) {
            $filters['name'] = $request->name;
        }

        if (isset($request->address)) {
            $filters['address'] = $request->address;
        }

        if (isset($request->phone)) {
            $filters['phone'] = $request->phone;
        }

        $order = $this->orderRepository->getAllOrderByYear($filters);

        foreach ($order as $item) {
            $total = 0;
            if (!$item->orderLine->isEmpty()) {
                $total = $total + $item->orderLine[0]->price;
            }
            $item->total = $total;
        }

        return view('admin.order', compact('order'));
    }

    public function promotionView()
    {
        $promotion_auto = $this->promotionRepository->getCodeAuto();
        $promotion_add = $this->promotionRepository->getCodeAdd();

        return view('admin.promotion.index', compact('promotion_add', 'promotion_auto'));
    }

    public function addPromotion(Request $request)
    {
        if ($request->type == 'auto') {
            $this->promotionRepository->deleteAllCodeAuto();
            for ($i = 0; $i < $request->number; $i++) {
                $random = $this->generateRandomString();

                $dataPromotion = [
                    'promotion_code' => $random,
                    'start_date' => date('Y-m-d H:i:s'),
                    'expire_date' => date('Y-m-d H:i:s'),
                    'type' => 'auto',
                    'percent' => $request->percent,
                    'status' => 'on'
                ];

                $this->promotionRepository->create($dataPromotion);
            }
        }

        if ($request->type == 'add') {
            $dataPromotion = [
                'promotion_code' => $request->code,
                'start_date' => date('Y-m-d H:i:s'),
                'expire_date' => date('Y-m-d H:i:s'),
                'type' => 'add',
                'percent' => $request->percent,
                'status' => 'on'
            ];

            $this->promotionRepository->create($dataPromotion);
        }

        alert()->success('Thành công!', 'Tạo mã thành công!');

        return redirect()->route('admin.promotion.index');
    }

    public function viewProfile()
    {
        $data['garages'] = DB::table('users')
            ->where('id', Auth::user()->sub_user)->first();

        return view('admin.profile', ['data' => $data]);
    }

    public function uploadAvatar(Request $request)
    {
        $path = '/uploads/profile/';
        $pathMove = 'uploads\profile';

        $imageName = 'avatar_' . time() . '._' . Auth::user()->name . '.' . $request->avatar->extension();
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $profile_photo_path = $path . '/' . $imageName;

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['profile_photo_path' => $profile_photo_path]);

        $request->avatar->move(public_path($pathMove), $imageName);

        return redirect('/admin/profile');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        $userPassword = $user->password;

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password' => 'Xác nhận mật khẩu không trùng khớp']);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success', 'Mật khẩu đã được thay đổi!');
    }

    public function getAnalystOrder()
    {
        for ($i = 0; $i < 12; $i++) {
            $count = 0;
            $month = $i + 1;
            $each_month = $this->paymentRepository->getPriceByEachMonth($month);

            if ($each_month->count() > 0) {
                foreach ($each_month as $record) {
                    $count = $count + $record->cost;
                }
            }

            $data['each_month'][$i] = [$count, ($count * 40) / 100];
        }

        $payment = $this->paymentRepository->getPriceByCurrentYear(1);

        $total = 0;
        foreach ($payment as $record) {
            $total = $total + $record->cost;
        }

        $data['total'] = $total;

        return $data;
    }

    public function getDataAnalysis(Request $request)
    {
        $pieData = new \stdClass();
        $pieData->datasets[] = new \stdClass();
        $invoice_doctor = $this->invoiceDoctorRepository->getListDoctorWithInvoice();
        foreach ($invoice_doctor as $invoice) {
            $doctor = $this->userRepository->getNameById($invoice->doctor_id);
            $pieData->labels[] = $doctor->name;
            $invoiceByDoctor = $this->invoiceDoctorRepository->getInvoiceByDoctor($request->type, $request->date, $invoice->doctor_id);

            $total = 0;
            foreach ($invoiceByDoctor as $i_d) {
                $total += $i_d->total;
            }

            $pieData->datasets[0]->data[] = $total;
            $pieData->datasets[0]->backgroundColor[] = $this->random_color();
        }

        return $pieData;
    }

    public function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    public function random_color()
    {
        return '#' . $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function export(Request $request)
    {
        if (isset($request->type)) {
            if ($request->type == 'storage_history') {
                $file_name = 'storage_history_' . date('Y-m-d') . '.xlsx';
                return Excel::download(new StorageHistoryExport(), $file_name);
            }
        }
    }

    public function changeStatusCode(Request $request)
    {
        if ($request->type == 'auto') {
            $this->promotionRepository->updateStatusCodeAuto($request->status);
        }

        if ($request->type == 'add') {
            $this->promotionRepository->updateStatusCodeAdd($request->status, $request->id);
        }

        return redirect()->route('admin.promotion.index');
    }

    public function getInforSchedule(Request $request)
    {
        $schedule = $this->scheduleRepository->getScheduleById($request->id);
        $name = $this->userRepository->getNameById($schedule->customer_id);
        $schedule->name = $name->name;

        return $schedule;
    }

    public function editStatusOrder(Request $request)
    {
        $id = $request->id;
        $status = $request->status;

        $edit_status = $this->orderRepository->updateStatus($id, $status);

        if ($edit_status == 1) {
            alert()->success('Thành công!', 'Cập nhật trạng thái thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Cập nhật trạng thái lỗi!');
        }

        return redirect()->route('admin.order.index');
    }

    public function doctorView()
    {
        $schedules = $this->scheduleRepository->getScheduleByDoctorInDay(Auth::user()->id);
        $services = $this->serviceRepository->getListService();
        
        $check = 0;
        foreach($schedules as $schedule) {
            if($schedule->status == 1) {
                $check = 1;
            }
        }

        return view('admin.doctor', compact('schedules', 'services', 'check'));
    }

    public function getDetailOrder(Request $request)
    {
        if (isset($request->payment_code)) {
            $invoice = $this->invoiceRepository->getInvoiceByPaymentCode($request->payment_code);
            if ($invoice != null) {
                $order = Order::join('order_line', 'order_line.order_id', '=', 'order.id')->join('products', 'order_line.product_id', '=', 'products.id')->where('order.id', $invoice->id)->get();
                $payment = $this->paymentRepository->getPaymentByCode($invoice->payment_code);

                $total = 0;
                foreach ($order as $item) {
                    $total = $total + $item->price;
                }
                $data['total'] = $total;
                $data['order'] = $order;
                $data['name_customer'] = $payment->name_customer;
                $data['phone_customer'] = $payment->phone_customer;
                $data['address_customer'] = $payment->address_customer;
            }
        }

        return $data;
    }

    public function printPreview(Request $request)
    {
        $data = [];
        $data['total'] = 0;

        if (isset($request->user_id)) {
            $data['user'] = $this->userRepository->getById($request->user_id);
        }

        if (isset($request->service)) {
            $services = explode(',', $request->service);
            foreach ($services as $service) {
                $getService = $this->serviceRepository->getById($service);
                $data['service'][] = $getService;
                $data['total'] = $data['total'] + (int) $getService->price;
            }
        }

        return view('admin.invoice', compact('data'));
    }

    public function storeInvoiceDoctor(Request $request)
    {
        if (isset($request->services)) {
            $total = 0;
            foreach ($request->services as $service) {
                $getService = $this->serviceRepository->getById($service);
                $total = $total + (int) $getService->price;
            }

            $data = [
                'invoice_code' => $this->createInvoiceCode(),
                'services' => implode(',', $request->services),
                'total' => $total,
                'doctor_id' => Auth::user()->id
            ];

            $invoice_doctor = $this->invoiceDoctorRepository->create($data);

            if ($invoice_doctor instanceof InvoiceDoctor) {
                return 'success';
            } else {
                return 'fail';
            }
        } else {
            return 'empty';
        }
    }

    public function createInvoiceCode($length = 10)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $invoiceDoctor = $this->invoiceDoctorRepository->getInvoiceCode($randomString);

        if ($invoiceDoctor == null or !$invoiceDoctor . isEmpty()) {
            return $randomString;
        } else {
            $this->createInvoiceCode();
        }
    }

    public function deletePromotion(Request $request) {
        $product = $this->promotionRepository->deleteById($request->id);

        if ($product) {
            alert()->success('Thành công!', 'Xóa mã giảm giá thành công!');
        } else {
            alert()->warning('Cảnh báo!', 'Xóa mã giảm giá lỗi!');
        }

        return redirect()->route('admin.promotion.index');
    }
}
