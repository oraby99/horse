<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'area',
        'piece',
        'street',
        'house_number',
        'user_id',
        'apenue'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
