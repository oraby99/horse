<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Http\Resources\PaymentResponceResource;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
use App\Services\HesabePaymentService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    //
    protected $hesabeService;

    public function __construct(HesabePaymentService $hesabeService)
    {
        $this->hesabeService = $hesabeService;
    }

    public function checkout(Request $request)
    {
        try{
            $data = [];
            $total =  $this->getUserCartTotal(auth()->user()->id) + 5 ;
            $amount = number_format($total, 3, '.', '');
            $orderId = 'order-' . uniqid() . time(); // Generate a unique order ID
               // create pending order
            $order = new Order();
            $order->user_id =auth()->user()->id;
            $order->address_id = $request->address_id;
            $order->total = $amount;
            $order->order_number = $orderId;
            $order->save();
     
            $returnUrl = route('payment.success').'?status='.true;
            $responce = $this->hesabeService->createPayment($amount, $orderId,$returnUrl );
            $data['token'] = $responce;
            return response()->json([
                'data'=> new PaymentResponceResource($data),
                'status'=>200,
                'message'=>'Success'
            ]);
        }catch(Exception $e)
        {
            return response()->json(['data'=>null , 'status'=>500,'message'=>$e->getMessage()], 500);
        }
        
    }

    private function getUserCartTotal($userId)
    {
        return CartItem::where('user_id', $userId)
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->select(DB::raw('SUM(products.price * cart_items.qantity) as total'))
            ->value('total');
    }
}
