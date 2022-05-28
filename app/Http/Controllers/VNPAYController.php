<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Repositories\OrderLineRepository;
use App\Repositories\InvoiceRepository;
use App\Repositories\PromotionRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\StorageRepository;
use App\Http\Requests\ConfirmRequest;
use Illuminate\Http\Request;
use App\Models\Payment;
use Cart;

class VNPAYController extends Controller
{
    private OrderRepository $orderRepository;
    private OrderLineRepository $orderLineRepository;
    private InvoiceRepository $invoiceRepository;
    private PromotionRepository $promotionRepository;
    private PaymentRepository $paymentRepository;
    private StorageRepository $storageRepository;

    public function __construct(
        OrderRepository $orderRepository,
        OrderLineRepository $orderLineRepository,
        InvoiceRepository $invoiceRepository,
        PromotionRepository $promotionRepository,
        PaymentRepository $paymentRepository,
        StorageRepository $storageRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderLineRepository = $orderLineRepository;
        $this->invoiceRepository = $invoiceRepository;
        $this->promotionRepository = $promotionRepository;
        $this->paymentRepository = $paymentRepository;
        $this->storageRepository = $storageRepository;
    }

    //Tạo hóa đơn
    public function createPay(ConfirmRequest $request)
    {
        $cartItems = Cart::getContent();
        foreach ($cartItems as $item) {
            $storage = $this->storageRepository->getLastQuantity($item->id);

            if($storage->quantity < $item->quantity) {
                return redirect()->route('cart.list')->with('success', 'Số lượng sản phẩm trong kho không đủ! Vui lòng kiểm tra lại');
            }
        }
        //tạo payment code
        $payment_code = $this->generateRandomString(20);
        $cost = 0;
        $cart = Cart::getContent();
        // tính giá tiền sản phẩm
        foreach ($cart as $item) {
            $totalCostByItem = $item['price'] * $item['quantity'];
            $cost = $cost + $totalCostByItem;
        }
        //tính số tiền
        $data['cost'] = $cost;
        //tên khách hàng
        $data['name_customer'] = $request->name;
        $data['phone_customer'] = $request->phone;
        $data['address_customer'] = $request->address;
        $data['order_date'] = date('Y-m-d');
        $data['status'] = 'Chờ phê duyệt';
        // tạo order
        $order = $this->orderRepository->create($data);

        foreach ($cart as $item) {
            $dataOrderLine = [
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
            ];

            $dataInvoice = [
                'payment_code' => $payment_code,
                'order_id' => $order->id,
            ];
            //tạo orderline
            $this->orderLineRepository->create($dataOrderLine);
            //tạo hóa đơn
            $this->invoiceRepository->create($dataInvoice);
        }

        $data['order_id'] = $order->id;
        $data['payment_code'] = $payment_code;
        //Kiểm tra user
        if (isset($request->users_id)) {
            $data['users_id'] = $request->users_id;
        }
        //Kiểm tra promotion
        if (isset($request->promotion)) {
            $promotion = $this->promotionRepository->getPromotionByCode($request->promotion);
            //Tính tổng
            $data['cost'] = (int) $data['cost'] - ((int) $data['cost'] * $promotion->percent / 100);
            session()->put('promotion', $request->promotion);
        }

        return view('vnpay_php.index', ['data' => $data]);
    }

    public function paymentProcess(Request $request)
    {
        $payment = $this->paymentRepository->getPaymentByCode($request->payment_code);
        $order_line = $this->orderLineRepository->getOrderLineByOrder($payment->order_id);

        foreach ($order_line as $line) {
            $getLastQuantity = $this->storageRepository->getLastQuantity($line->product_id);
            if ((int) $line->quantity > (int) $getLastQuantity->quantity) {
                return view('pages.blog');
            }
        }

        $getRequest = $request->all();
        $arrayCheckParam = ['cost', 'name_customer', 'phone_customer', 'address_customer', 'order_date', 'order_id', 'payment_code'];

        $payment = new Payment();
        foreach ($getRequest as $key => $value) {
            if (in_array($key, $arrayCheckParam)) {
                $payment->$key = $value;
            }
        }

        if (Auth::check()) {
            $payment->users_id = Auth::user()->id;
        }
        $payment->status_payment = 'Thất Bại';

        $payment->save();

        $vnp_TmnCode = "7WK4YW9H";
        $vnp_HashSecret = "TRTHAHLXBYSUNSZWLRXAPZBITPGRWLYX";
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/payment-return?";

        $vnp_TxnRef = $_POST['payment_code'];
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_ExpireDate = $_POST['txtexpire'];
        $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        $vnp_Bill_Email = $_POST['txt_billing_email'];
        $fullName = trim($_POST['txt_billing_fullname']);
        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }
        $vnp_Bill_Address = $_POST['txt_inv_addr1'];
        $vnp_Bill_City = $_POST['txt_bill_city'];
        $vnp_Bill_Country = $_POST['txt_bill_country'];
        $vnp_Bill_State = $_POST['txt_bill_state'];
        $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
        $vnp_Inv_Email = $_POST['txt_inv_email'];
        $vnp_Inv_Customer = $_POST['txt_inv_customer'];
        $vnp_Inv_Address = $_POST['txt_inv_addr1'];
        $vnp_Inv_Company = $_POST['txt_inv_company'];
        $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
        $vnp_Inv_Type = $_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate,
            "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            "vnp_Bill_Email" => $vnp_Bill_Email,
            "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            "vnp_Bill_LastName" => $vnp_Bill_LastName,
            "vnp_Bill_Address" => $vnp_Bill_Address,
            "vnp_Bill_City" => $vnp_Bill_City,
            "vnp_Bill_Country" => $vnp_Bill_Country,
            "vnp_Inv_Phone" => $vnp_Inv_Phone,
            "vnp_Inv_Email" => $vnp_Inv_Email,
            "vnp_Inv_Customer" => $vnp_Inv_Customer,
            "vnp_Inv_Address" => $vnp_Inv_Address,
            "vnp_Inv_Company" => $vnp_Inv_Company,
            "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            "vnp_Inv_Type" => $vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );

        if (isset($vnp_Returnurl)) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    public function paymentReturn(Request $request)
    {
        $payment = $this->paymentRepository->getPaymentByCode($request->vnp_TxnRef);

        if ($request->session()->has('promotion')) {
            $code = session()->get('promotion');
            $promotion = $this->promotionRepository->getPromotionByCode($code);
            $percent = $promotion->percent;
            // $this->promotionRepository->updateStatusCodeByCode($code, 'used');
            $request->session()->forget('promotion');
        }

        return view('vnpay_php.vnpay_return', compact('code', 'percent'));
    }

    public function paymentFail(Request $request)
    {
        $data = new \stdClass();

        $this->paymentRepository->update($request->paymentid, 'Thất bại');
        // $request->status_payment="Thất bại";
        $data->textError = 'Thanh toán thất bại. Vui lòng thử lại';

        return view('pages.buy-fail', ['data' => $data]);
    }

    public function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $invoice = $this->invoiceRepository->getInvoiceByPaymentCode($randomString);
        if ($invoice != null) {
            $this->generateRandomString($length);
        }
        return $randomString;
    }
}
