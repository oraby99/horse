<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model implements TranslatableContract
{
    use HasFactory ,Translatable , SoftDeletes;
    public $translatedAttributes = ['name'];
    protected $translationForeignKey = 'country_id';

    protected $fillable = [
        'logo',
        'sign',
        'currency'
    ];

}
