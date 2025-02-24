<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Camp extends Model implements TranslatableContract
{ 
    use HasFactory , Translatable;
    public $translatedAttributes = ['name','description'];
    protected $translationForeignKey = 'camp_id';
    protected $fillable = [
        'images',
        'videos',
        'location',
        'country_id',
        'is_active',
        'category_id',
    ];


    protected $casts = [
        'images'=>'array',
        'videos'=>'array',
    ];


    // public function user()
    // {
    //     return $this->belongsTo(User::class , 'user_id');
    // }

    public function country()
    {
        return $this->belongsTo(Country::class , 'country_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }


    public function campLevel()
    {
        return $this->hasMany(CampLevel::class);
    }

    public function campSport()
    {
        return $this->hasMany(CampSport::class);
    }

    public function getPriceInCurrency($currencySign , $price)
    {
        $currency = Country::where('sign', $currencySign)->first();
        if (!$currency) {
            $currency = Country::first();
        }
        $convertedPrice = $price * $currency->currency;
        return $convertedPrice;
    }

}
