<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'order_number',
        'order_status',
        'payment_status',
        'shipment_status',
        'user_id',
        'address_id',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class,'order_items');
    }
    public function getPriceInCurrency($currencySign , $price)
    {
        $currency = Country::where('sign', $currencySign)->first();
        if (!$currency) {
            $currency = Country::first();
        }
        $convertedPrice = $price / $currency->currency;
        return $convertedPrice;
    }

}
