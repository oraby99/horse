<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterCamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'camp_id',
        'camp_level_id',
        'camp_sport_id',
        'name',
        'email',
        'age',
        'ride_with_trainer',
        'have_horse',
        'user_id',
        'total',
        'rider_level'
    ];

    public function camp()
    {
        return $this->belongsTo(Camp::class,'camp_id');
    }


    public function campLevel()
    {
        return $this->belongsTo(CampLevel::class,'camp_level_id');
    }

    public function campSport()
    {
        return $this->belongsTo(CampSport::class,'camp_sport_id');
    }


}
