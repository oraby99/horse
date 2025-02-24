<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavouriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($this->type == 'advertisment' && $this->advertisment) {
            return [
                'id' => $this->advertisment->id,
                'item_id' => $this->id,
                'name' => $this->advertisment->name,
                'category' => $this->advertisment->category->name,
                'price' => $this->price,
                'type' => $this->type,
                'is_sold' => $this->is_sold !== null ? $this->is_sold : 0,
                'image' => $this->advertisment->images != null ? asset('uploads/advertisments/'.$this->advertisment->images[0]) : asset('default.png'),
            ];
        } elseif ($this->type == 'product' && $this->product) {
            return [
                'id' => $this->product->id,
                'item_id' => $this->id,
                'name' => $this->product->name,
                'category' => $this->product->category->name,
                'price' => $this->price,
                'type' => $this->type,
                'image' => $this->product->images != null ? asset('uploads/products/'.$this->product->images[0]) : asset('default.png'),
            ];
        } else {
            // Handle the case where $this->advertisment or $this->product is null.
            return [
                'id' => 1,
                'item_id' => $this->id,
                'name' => 'Unknown',
                'category' => 'Unknown',
                'price' => $this->price,
                'type' => $this->type,
                'image' => asset('default.png'),
            ];
        }
    }

}
