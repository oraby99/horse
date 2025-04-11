<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Cart;
use App\Models\CartItem;
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
            $total = $this->getUserCartTotal(auth()->user()->id);
            $amount = number_format($total, 3, '.', '');
            $orderId = uniqid();
            $returnUrl = route('payment.success');
            $token = $this->hesabeService->createPayment($amount, $orderId,$returnUrl);
            return response()->json([
                'data'=> [
                    'payment_url'=>config('hesabe.api_url').'payment?data='.$token,
                    'callback_url'=>route('payment.success'),
                    'fail_url'=>route('payment.failed')        
                ],
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
