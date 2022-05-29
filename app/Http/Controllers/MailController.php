<?php

namespace App\Http\Controllers;

use App\Repositories\PaymentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\InvoiceMail;
use App\Mail\AcceptMail;
use App\Mail\DenyMail;
use Mail;

class MailController extends Controller
{
    private PaymentRepository $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index()
    {
        $mailData = [
            'title' => 'Thư từ DiamondPet.com',
            'body' => 'Thưa quý khách,',
        ];
        //xem cart hiện tại
        $cartItems = session()->get('cartItems');
        session()->forget('cartItems');
        //lấy hóa đơn
        $payment = $this->paymentRepository->getPaymentById($_GET['payment_id']);
        //chuyển sang trạng thái thành công
        $payment->update(['status_payment' => 'Thành công']);
        $url = $_SERVER['HTTP_HOST'] . '/invoice-check?payment_code=' . $payment->payment_code;
        if(isset($_GET['promotion'])) {
            $url = $url . '&promotion=' . $_GET['promotion'];
        }

        if(isset($_GET['percent'])) {
            $url = $url . '&percent=' . $_GET['percent'];
        }
        $mailData['url'] = $url;

        $data['name_customer'] = $payment->name_customer;
        $data['phone_customer'] = $payment->phone_customer;
        $data['address_customer'] = $payment->address_customer;

        Mail::to(Auth::user()->email)->send(new InvoiceMail($mailData));

        return view('pages.invoice', ['data' => $data, 'cartItems' => $cartItems]);
    }

    public function scheduleMail(Request $request)
    {
        $mailData = [
            'title' => 'Thư từ DiamondPet.com',
            'body' => 'Thưa quý khách,',
            'date' => $request->date,
            'hours' => $request->hours,
            'doctor' => $request->doctor,
        ];

        if($request->status == 1) {
            Mail::to($request->email)->send(new AcceptMail($mailData));
        } else {
            Mail::to($request->email)->send(new DenyMail($mailData));
        }

        alert()->success('Thành công!', 'Duyệt lịch thành công!');
       
        return redirect()->route('admin.schedule.index');
    }
}
