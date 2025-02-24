<?php

namespace App\Models;

use App\Enums\AdvertismentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisment extends Model
{
    use HasFactory , SoftDeletes;

        protected $fillable = [
            'name',
            'description',
            'images',
            'videos',
            'price',
            'category_id',
            'user_id',
            'plan_id',
            'country_id',
            'location',
            'age',
            'phone',
            'ads_type',
            'type',
            'is_sold',
            'is_active',
            'is_expire',

        ];
        protected $casts = [
             'images'=>'array',
             'videos'=>'array',
            'ads_type'=>AdvertismentStatus::class,

        ];
        public function category()
        {
            return $this->belongsTo(Category::class,'category_id');
        }
        public function plan()
        {
            return $this->belongsTo(Plan::class , 'plan_id');
        }
        public function user()
        {
            return $this->belongsTo(User::class , 'user_id');
        }
        public function country()
        {
            return $this->belongsTo(Country::class , 'country_id');
        }

        public function favourite()
        {
            return $this->hasMany(AdsFavourite::class,'advertisment_id');
        }
        public function getPriceInCurrency($currencySign , $price)
        {
            $currency = Country::where('sign', $currencySign)->first();
            if (!$currency) {
                $currency = Country::first();
            }
            $convertedPrice = $price * $currency->currency;
            //return number_format($convertedPrice, 2);
            return $convertedPrice;
        }
        public function scopeExpire($query)
        {
            $query->where('is_expire',true);
        }
        public function scopeNotExpire($query)
        {
            $query->where('is_expire',false);
        }
        public function scopeFilter($query, $params)
        {

            if(isset($params['category_id']))
            {
                $query->where('category_id',$params['category_id']);
            }

            if(isset($params['type']))
            {
                $query->where('type',$params['type']);
            }

            if(isset($params['ads_type']))
            {
                $query->where('type',$params['ads_type']);
            }

            return $query;
        }

}
