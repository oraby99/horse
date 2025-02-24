<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->product->name,
            'colors' => implode(', ', json_decode($this->colors)),
            'size' => implode(', ', json_decode($this->size)),
            'price' => $this->product->price,
            'product_id' => $this->product->id,
            'deliver_time' => $this->product->deliver_time,
            'image' => $this->product->images != null ? asset('uploads/products/'.$this->product->images[0]) : asset('default.png'),
            'count' => (int)$this->qantity,
            'stock' => $this->product->stock,
            'total' => number_format((float)$this->price * $this->qantity, 2),
            'total_kwd' => number_format((float)$this->price_in_kwd * $this->qantity, 2),
        ];
    }



}
