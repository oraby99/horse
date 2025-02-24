<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Product extends Model implements TranslatableContract
{
    use HasFactory , Translatable;
    public $translatedAttributes = ['name','description'];
    protected $translationForeignKey = 'product_id';

    protected $fillable = [
        'images',
        'videos',
        'deliver_time',
        'price',
        'colors',
        'stock',
        'security_stock',
        'category_id',
        'size',
        'stock',
        'security_stock'
    ];
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    protected $casts = [
        'images'=>'array',
        'videos'=>'array',
        'colors'=>'array',

    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class,'order_items');
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'cart_items');
    }


    public function getPriceInCurrency($currencySign , $price)
    {
        $currency = Country::where('sign', $currencySign)->first();
        if (!$currency) {
            $currency = Country::first();
        }
        $convertedPrice = $price * $currency->currency;
        return number_format($convertedPrice, 2);
    }


}
