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
        // Ensure colors and size are arrays, with a fallback
        $colors = $this->colors ? (is_string($this->colors) ? json_decode($this->colors, true) : $this->colors) : [];
        $size = $this->size ? (is_string($this->size) ? json_decode($this->size, true) : $this->size) : [];

        // Ensure product relationship exists, provide fallback values
        $product = $this->product ?? null;
        $images = $product && !empty($product->images) ? $product->images : [];

        return [
            'id' => $this->id,
            'name' => $product ? $product->name : 'N/A',
            'colors' => is_array($colors) ? implode(', ', $colors) : '',
            'size' => is_array($size) ? implode(', ', $size) : '',
            'price' => $product ? $product->price : 0,
            'product_id' => $product ? $product->id : null,
            'deliver_time' => $product ? $product->deliver_time : null,
            'image' => !empty($images) ? asset('uploads/products/' . $images[0]) : asset('default.png'),
            'count' => (int)$this->qantity,
            'stock' => $product ? $product->stock : 0,
            'total' => number_format((float)($product ? $product->price * ($this->quantity ?? 0) : 0), 2),
            'total_kwd' => number_format((float)($product ? $this->price_in_kwd * ($this->quantity ?? 0) : 0), 2),
        ];
    }
}