<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'price'=> $this->price,
            'category'=>optional($this->category)->name,
            'type'=>'product',
            'image'=> $this->images != null ?  asset('uploads/products/'.$this->images[0]) : asset('default.png'),

        ];
    }
}
