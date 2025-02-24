<?php

namespace App\Http\Resources;

use App\Models\AdsFavourite;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AdvertismentDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if ($bearerToken = $request->bearerToken()) {
            $user = Auth::guard('sanctum')->setRequest($request)->user();
        } else {
            $user = null;
        }
        if ($user) {
            $favouriteId = AdsFavourite::where('user_id', $user->id)->where('advertisment_id', $this->id)->first();
            $favouriteId = $favouriteId ? $favouriteId->id : null;
            $instagramLink = $user->link;
        } else {
            $favouriteId = null;
            $instagramLink = null;
        }
        $images = $this->images;
        $dataImages = [];
        if ($images !== null) {
            if (is_array($images) || is_object($images)) {
                foreach ($images as $image) {
                    $dataImages[] = asset('uploads/advertisments/' . $image);
                }
            }
        }
        $videos = $this->videos;
        $dataVideos = [];
        if ($videos !== null) {
            if (is_array($videos) || is_object($videos)) {
                foreach ($videos as $item) {
                    $dataVideos[] = asset('uploads/videos/' . $item);
                }
            }
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => optional($this->category)->name,
            'images' => $dataImages,
            'videos' => $dataVideos,
            'price' => $this->price,
            'age' => $this->age,
            'location' => $this->country->name,
            'description' => $this->description,
            'favourite_id' => $favouriteId,
            'type' => 'advertisment',
            'phone' => $this->phone,
            'category_id' => $this->category_id,
            'plan_id' => $this->plan_id,
            'country_id' => $this->country_id,
            'ads_type' => $this->ads_type,
            'instgram' => $instagramLink,
        ];
    }
}

