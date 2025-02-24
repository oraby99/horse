<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
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
            'category'=>$this->category->name,
            'price'=>$this->price,
            'type'=>$this->type,
            'image'=>$this->type == 'product' ? asset('uploads/products/'.$this->images[0]) :  asset('uploads/advertisments/'.$this->images[0])
        ];
    }
}
