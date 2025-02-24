<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CampDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $images = $this->images;
        $dataImages = []; 
        if($images != null)
        {
            foreach($images as $image)
            {
                $dataImages [] = asset('uploads/camps/'.$image);
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
            'description'=>$this->description,
            'location'=>optional($this->country)->name,
            'images'=>$dataImages,
            'videos'=>$dataVideos,
            'category'=>optional($this->category)->name,
            'price'=>$this->price
        ];
    }
}
