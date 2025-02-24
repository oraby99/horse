<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampLevel extends Model
{
    use HasFactory;
    protected $fillable =[
        'camp_id',
        'level',
        'total'
    ];

    public function camp()
    {
        return $this->belongsTo(Camp::class,'camp_id');
    }

    public function scopeFilter($query, $params)
    {
        if(isset($params['camp_id']))
        {
            $query->where('camp_id',$params['camp_id']);
        }
    }

}
