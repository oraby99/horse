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
        // Ensure the amount is passed correctly from the frontend
        $amount = $request->totalPrice; // Debug this value
        //\Log::info('Total Price:', ['totalPrice' => $amount]);
    
        if (!$amount || $amount <= 0) {
            return redirect()->route('payment.failed')->with('error', 'Invalid amount.');
        }
    
        $orderId = uniqid(); // Generate a unique order ID
        $returnUrl = route('payment.success');
    
        try {
            $paymentUrl = $this->hesabeService->createPayment($amount, $orderId, $returnUrl);
            return redirect($paymentUrl);
        } catch (\Exception $e) {
            return redirect()->route('payment.failed')->with('error', $e->getMessage());
        }
    }

    public function handleSuccess(Request $request)
    {
        $response = $this->hesabeService->verifyPayment($request->all());
    
        if ($response['status'] === 'success') {
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