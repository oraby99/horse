<?php

namespace App\Http\Resources;

use App\Models\ProductFavourite;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProductDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        if ($bearerToken = $request->bearerToken()) {
            // This will attempt to authenticate using the token but won't fail if the token is invalid
            $user = Auth::guard('sanctum')->setRequest($request)->user();
        } else {
            $user = null;
        }
        if($user)
        {
            $favouriteId = ProductFavourite::where('user_id',$user->id)->where('product_id',$this->id)->first();
            $favouriteId = $favouriteId ? $favouriteId->id : null;
        }else{
            $favouriteId = null;
        }
        $images = $this->images;
        $dataImages = [];
        if($images != null)
        {
            foreach($images as $image)
            {
                $dataImages [] = asset('uploads/products/'.$image);
            }
        }
        $videos = $this->videos;
        $dataVideos = [];
        if($videos != null)
        {
            foreach($videos as $item)
            {
                $dataVideos [] = asset('uploads/videos/'.$item);
            }
        }
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'category'=>optional($this->category)->name,
            'images'=>$dataImages,
            'videos'=>$dataVideos,
            'deliver_time'=>$this->deliver_time,
            'size'=>$this->size,
            'colors'=>$this->colors,
            'price'=>$this->price,
            'description'=>$this->description != null ?  explode(',' , $this->description) : null,
            'favourite_id'=>$favouriteId,
            'type'=>'product'
        ];
    }
}
