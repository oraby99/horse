<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsFavourite extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'advertisment_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    
    public function advertisment()
    {
        return $this->belongsTo(Advertisment::class,'advertisment_id');
    }
}
