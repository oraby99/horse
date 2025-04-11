<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'payment_url'=>config('hesabe.api_url').'/payment?data='.$this->token,
            'callback_url'=>route('payment.success'),
            'fail_url'=>route('payment.failed')
        ];
    }
}
