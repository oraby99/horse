<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_id',
        'user_id',
        'qantity',
        'total',
        'colors',
        'size'
    ];

    public function getPriceInCurrency($currencySign , $price)
    {
        $currency = Country::where('sign', $currencySign)->first();
        if (!$currency) {
            $currency = Country::first();
        }
        $convertedPrice = $price * $currency->currency;
        return number_format($convertedPrice, 2);
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
