<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory , Translatable;
    public $translatedAttributes = ['name','description'];
    protected $translationForeignKey = 'plan_id';
    protected $fillable = [
        'price',
        'time',
        'type'
    ];
}
