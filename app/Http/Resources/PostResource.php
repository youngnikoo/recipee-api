<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $descriptions = str_replace("\r\n", " ", $this->description);

        return [
            'id' => $this->id,
            'image' => asset('storage/' . $this->image),
            'title' => $this->title,
            'description' => $descriptions
        ];
    }
}
