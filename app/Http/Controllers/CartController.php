<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
       // dd($request->all());
        $request->validate([
            'qantity' => 'required|integer|min:1',
            'size' => 'required',
            'color' => 'required',
        ]);
        $user = auth()->user();
        $cart = $user->carts->where('product_id', $id)->first();
        if ($cart) {
            $cart->qantity += $request->qantity;
            $cart->total = $request->price * $cart->qantity;
            $cart->save();
        } else {
            CartItem::create([
                'product_id' => $request->product_id,
                'qantity'  => $request->qantity,
                'user_id'   => $user->id,
                'price'     => $request->price,
                'total'     => $request->price * $request->qantity,
                'size'      => $request->size,
                'color'     =>  $request->color,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }


    public function showCart()
    {
        $user = auth()->user();
        $cartItems = $user->carts;
        return view('cart', compact('cartItems'));
    }
    public function removeItem($id)
    {
        $cartItem = CartItem::find($id);
        if (!$cartItem) {
            return response()->json(['error' => 'Cart item not found.'], 404);
        }
        $cartItem->delete();
        return redirect()->route('cart')->with('success', 'cart deleted successfully !');
    }
}
