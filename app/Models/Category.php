<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
class Category extends Model implements TranslatableContract
{
    use HasFactory , Translatable;
    public $translatedAttributes = ['name'];
    protected $translationForeignKey = 'category_id';

    protected $fillable = [
        'image',
        'parent_id',
        'has_child',
        'type'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function scopeFilter($query, $params)
    {
        
       

        if(isset($params['type']))
        {
            $query->where('type',$params['type']);
        }
        return $query;
    }

}
