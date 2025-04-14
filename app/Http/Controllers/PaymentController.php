<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\HesabePaymentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
            $token = $this->hesabeService->createPayment($amount, $orderId, $returnUrl);
            return Redirect::to(config('hesabe.api_url').'payment?data='.$token);
            // return redirect($paymentUrl);
        } catch (\Exception $e) {
            return redirect()->route('payment.failed')->with('error', $e->getMessage());
        }
    }

    public function handleSuccess(Request $request)
    {
        try{

            $response = $this->hesabeService->verifyPayment($request->all());
            if ($response['status'] == true) {
                DB::beginTransaction();
                // Here you can save the payment details to your database, e.g.,
                $order = new Order();
                $order->user_id         = auth()->id();
                $order->address_id      = $request->address_id;
                $order->total           = $request->total;
                $order->order_status =  'completed';
                $order->payment_status =  'completed';
                $order->save();
                // add order detail and remove cart 

                $carts = CartItem::where('user_id', auth()->id())->get();
                foreach($carts as $cart)
                {
                    OrderItem::create([
                        'order_id'=>$order->id,
                        'product_id'=>$cart->product_id,
                        'qantity'=>$cart->qantity,
                        'total'=>$cart->total,
                    ]);
                    $cart->delete();
                }
                DB::commit();
                return view('payment.success', ['data' => $response,'status'=>true]);
            }
        }catch(Exception  $e){
            DB::rollBack();
            return redirect()->route('payment.failed')->with('error', $response['message'] ?? 'Payment verification failed.');
        }
    }
    

    public function handleFailed()
    {
        return view('payment.failed');
    }
}