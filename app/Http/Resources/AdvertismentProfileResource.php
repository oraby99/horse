<?php

namespace App\Http\Resources;

use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertismentProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $plan = Plan::find($this->plan_id);
        $expire_at = $plan ? Carbon::parse($this->updated_at)->addMonths($plan->time)->format('Y-m-d') : null;

        return [
            'id' => $this->id,
            'category' => optional($this->category)->name,
            'name' => $this->name,
            'price' => $this->price,
            'type' => 'advertisment',
            'expire_at' => $this->is_expire ? null : $expire_at,
            'is_sold' => $this->is_sold,
            'image'=> $this->images != null ?  asset('uploads/advertisments/'.$this->images[0]) : asset('default.png'),
        ];
    }

}
