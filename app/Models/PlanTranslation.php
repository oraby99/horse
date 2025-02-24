<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTranslation extends Model
{
    use HasFactory;
    protected $table = 'plan_translations';
    protected $fillable = [
        'name',
        'description',
        'locale',
        'plan_id'
    ];
}
