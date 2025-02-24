<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CampResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
{
    $imageURL = $this->images ? asset('uploads/camps/'.$this->images[0]) : asset('default.png');

    return [
        'id' => $this->id,
        'image' => $imageURL,
        'price' => null,
        'name' => $this->name,
        'category' => optional($this->category)->name,
    ];
}

}
