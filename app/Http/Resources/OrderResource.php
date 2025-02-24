<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'id'              =>$this->id,
            'order_number'    =>$this->order_number ,
            'order_status'    =>$this->order_status ,
            'payment_status'  =>$this->payment_status ,
            'shipment_status' =>$this->shipment_status ,
            'total'           =>$this->total ,
            'address_id'      =>$this->address_id ,
            'user_id'         =>$this->user_id ,
        ];
    }
}
