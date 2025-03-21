<?php

namespace App\Http\Controllers;

use App\Services\HesabePaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $hesabeService;

    public function __construct(HesabePaymentService $hesabeService)
    {
        $this->hesabeService = $hesabeService;
    }

    public function initiatePayment(Request $request)
    {

        // converti price to payment format 
        $amount = number_format($request->price, 3, '.', '');
        // $request->validate([
        //     'price' => 'required|numeric|between:0.200,100000|regex:/^\d+(\.\d{1,3})?$/',
        // ]);
        \Log::info('Total Price:', ['totalPrice' => $amount]);
        
        if (!$amount || $amount <= 0) {
            return redirect()->route('payment.failed')->with('error', 'Invalid amount.');
        }
    
        $orderId = uniqid(); // Generate a unique order ID
        $returnUrl = route('payment.success');
        try {
            $paymentUrl = $this->hesabeService->createPayment($amount, $orderId, $returnUrl);
          return $paymentUrl;
            // return redirect($paymentUrl);
        } catch (\Exception $e) {
            return redirect()->route('payment.failed')->with('error', $e->getMessage());
        }
    }

    public function handleSuccess(Request $request)
    {
        $response = $this->hesabeService->verifyPayment($request->all());
        if ($response['status'] == true) {
            // Here you can save the payment details to your database, e.g.,
            // Order::create([...]);
    
            return view('payment.success', ['data' => $response]);
        }
    
        return redirect()->route('payment.failed')->with('error', $response['message'] ?? 'Payment verification failed.');
    }
    

    public function handleFailed()
    {
        return view('payment.failed');
    }
}