<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $sum = $request->price + 5 ; 
        $amount = number_format($sum, 3, '.', '');
        $orderId = uniqid(); // Generate a unique order ID
        // create pending order
        $order = new Order();
        $order->user_id =auth()->user()->id;
        $order->address_id = 1;
        $order->total = $amount;
        $order->order_number = $orderId;
        $order->save();
        \Log::info('Total Price:', ['totalPrice' => $amount]);
        
        if (!$amount || $amount <= 0) {
            return redirect()->route('payment.failed')->with('error', 'Invalid amount.');
        }
    
        $returnUrl = route('payment.success');
        try {
            $responce = $this->hesabeService->createPayment($amount, $orderId, $returnUrl);
            return Redirect::to(config('hesabe.api_url').'payment?data='.$responce);
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
                $order = Order::where('order_number',$response['response']['orderReferenceNumber'])->first(); 
                $order->shipment_status = $response['response']['method'];
                $order->order_status =  'completed';
                $order->payment_status =  'completed';
                $order->save();

                $carts = CartItem::where('user_id', $order->user_id)->get();
                // Cart::where('user_id',$order->user_id)->delete();
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
            return $e;
            // return redirect()->route('payment.failed')->with('error', $response['message'] ?? 'Payment verification failed.');
        }
    }
    

    public function handleFailed()
    {
        return view('payment.failed');
    }
}