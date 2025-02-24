<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'apenue'=>$this->apenue,
            // 'email'=>$this->email,
            // 'phone'=>$this->phone,
            'city'=>$this->city,
            'area'=>$this->area,
            'piece'=>$this->piece,
            'street'=>$this->street,
            'house_number'=>$this->house_number
        ];
    }
}
