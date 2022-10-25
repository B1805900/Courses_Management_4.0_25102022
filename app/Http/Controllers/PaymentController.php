<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\SavedCourse;
use Omnipay\Omnipay;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct(){
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }
    public function pay(Request $request){
        try{
            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => route('success'),
                'cancelUrl' => route('error')
            ))->send();

            if($response->isRedirect()){
                $response->redirect();
            }else{
                return $response->getMessage();
            }
        }catch(\Throwable $th){
            throw $th;
        }
    }

    public function success(Request $request){

        if($request->paymentId && $request->PayerID){
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->PayerID,
                'transactionReference' => $request->paymentId,
            ));

            $response = $transaction->send();

            if($response->isSuccessful()){
                $arr = $response->getData();

                $payment_id = Payment::create([
                    'payment_id' => $arr['id'],
                    'payer_id' => $arr['payer']['payer_info']['payer_id'],
                    'payer_email' => $arr['payer']['payer_info']['email'],
                    'amount' => $arr['transactions'][0]['amount']['total'],
                    'currency' => env('PAYPAL_CURRENCY'),
                    'payment_status' => $arr['state']
                ])->id;
                if($payment_id){

                    SavedCourse::create([
                        'course_id' =>  $payment_id,
                        'user_id' => Auth::id(),
                        'day_saved' => now(),
                    ]);
                }
                return redirect()->route('showMainPage')->with('success',"Thanh toán thanh công. Mã giao dịch của bạn là : " . $arr['id']);
            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return "Thanh toán không thành công! Hãy thử lại sau.";
        }
    }
    public function error(){
        return 'Người dùng hủy thanh toán';
    }
}
