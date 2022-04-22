<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\ProductRepository;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\PaymentRepository;
use App\Repositories\InvoiceRepository;
use App\Repositories\UserRepository;
use App\Repositories\PromotionRepository;
use App\Repositories\ServiceRepository;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Order;
use Cart;

class FeatureController extends Controller
{
    private ProductRepository $productRepository;
    private PaymentRepository $paymentRepository;
    private InvoiceRepository $invoiceRepository;
    private PromotionRepository $promotionRepository;
    private UserRepository $userRepository;
    private ServiceRepository $serviceRepository;

    public function __construct(
        ProductRepository $productRepository,
        PaymentRepository $paymentRepository,
        InvoiceRepository $invoiceRepository,
        UserRepository $userRepository,
        PromotionRepository $promotionRepository,
        ServiceRepository $serviceRepository
    ) {
        $this->productRepository = $productRepository;
        $this->paymentRepository = $paymentRepository;
        $this->invoiceRepository = $invoiceRepository;
        $this->promotionRepository = $promotionRepository;
        $this->userRepository = $userRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function viewWelcome()
    {
        $products = $this->productRepository->getAll();

        return view('pages.welcome', compact('products'));
    }

    public function viewContact()
    {
        return view('pages.contact');
    }

    public function viewAbout()
    {
        return view('pages.about');
    }

    public function viewBlog()
    {
        return view('pages.blog');
    }

    public function viewProduct()
    {
        return view('pages.product');
    }

    public function viewService()
    {
        $services = $this->serviceRepository->getAllServiceWithDoctor();

        return view('pages.service', compact('services'));
    }

    public function viewProfile()
    {
        if (Auth::check()) {
            $dob = Auth::user()->dob;
            $explode = explode('-', $dob);

            $data['day'] = $explode[2];
            $data['year'] = $explode[0];
            $data['month'] = $explode[1];

            return view('pages.profile', ['data' => $data]);
        }

        abort(404);
    }

    public function viewHistory()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $data = [];
            $total_cost = 0;
            $payments = $this->paymentRepository->getPaymentByUsersId($id);

            foreach ($payments as $history) {
                $history->code = $history->payment_code;
                $history->date = $history->order_date;

                $history->total_buy = $this->paymentRepository->countTotalBuy($id);

                if (count($data) == 0) {
                    $data[$history->date][] = $history;
                    continue;
                }

                if (isset($data[$history->date])) {
                    foreach ($data[$history->date] as $trips) {
                        if ($trips->trips_id == $history->trips_id) {
                            continue 2;
                        }
                    }
                }

                $data[$history->date][] = $history;
                $total_cost = $total_cost + $history->cost;
            }

            return view('pages.history-buy', compact('data'));
        }

        abort(404);
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

    public function viewConfirmOrder()
    {
        $cartItems = Cart::getContent();
        return view('pages.confirm_order',  compact('cartItems'));
    }

    public function sendContact(ContactRequest $request)
    {

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->message = $request->message;

        $contact->save();
        session()->flash('success', 'Gửi thông điệp thành công!');

        return redirect('/contact');
    }

    public function invoice(Request $request)
    {
        $cartItems = Cart::getContent();

        if ($cartItems->isEmpty()) {
            $url = '/invoice-check?payment_code=' . $request->payment_code;
            return redirect($url);
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $totalCostByItem = $item['price'] * $item['quantity'];
            $total = $total + $totalCostByItem;
        }
        Cart::clear();
        $payment = $this->paymentRepository->getPaymentByCode($request->payment_code);
        $this->paymentRepository->update($payment->id, 'Thành công');

        $data['name_customer'] = $payment->name_customer;
        $data['phone_customer'] = $payment->phone_customer;
        $data['address_customer'] = $payment->address_customer;

        if (Auth::check()) {
            session()->put('cartItems', $cartItems);
            return redirect()->route('mail.invoice', ['payment_id' => $payment->id, 'total' => $total]);
        }

        return view('pages.invoice', ['data' => $data, 'cartItems' => $cartItems, 'total' => $total]);
    }

    public function lastInvoice(Request $request)
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

                return view('pages.last_invoice', compact('data'));
            }
            abort(404);
        }
        abort(404);
    }

    public function inputCode(Request $request)
    {
        $code = $request->promotion;

        $promotion = $this->promotionRepository->getPromotionByCode($code);

        if ($promotion != null) {
            if ($promotion->status == 'used') {
                session()->flash('success', 'Mã giảm giá đã được sử dụng!');
                return redirect()->route('cart.list', ['code' => $code, 'status' => 3, 'percent' => $promotion->percent]);
            }

            if ($promotion->status == 'off') {
                session()->flash('success', 'Mã giảm giá hiện đang đóng!');
                return redirect()->route('cart.list', ['code' => $code, 'status' => 2, 'percent' => $promotion->percent]);
            }

            if ($promotion->status == 'on') {
                session()->flash('success', 'Mã giảm giá đã được áp dụng!');
                return redirect()->route('cart.list', ['code' => $code, 'status' => 1, 'percent' => $promotion->percent]);
            }
        }

        session()->flash('success', 'Mã giảm giá không tồn tại!');
        return redirect()->route('cart.list', ['code' => $code, 'status' => 4]);
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $dob =  $request->year . '-' . $request->month . '-' . $request->day;
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'cmt' => $request->cmt,
            'gender' => $request->gender,
            'dob' => $dob
        ];

        $users = $this->userRepository->updateProfile(Auth::user()->id, $data);

        if ($users == 1) {
            return redirect()->back()->with('success', 'Thông tin cá nhân thay đổi thành công!');
        } else {
            return redirect()->back()->with('success', 'Thông tin cá nhân thay đổi không thành công!');
        }
    }
}
