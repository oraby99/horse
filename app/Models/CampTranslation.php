<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampTranslation extends Model
{
    use HasFactory;
    protected $table = 'camp_translations';
    protected $fillable = [
        'name',
        'description',
        'locale',
        'camp_id'
    ];
}
