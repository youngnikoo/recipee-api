<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ShowPostResource;

class ShowPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => asset('storage/' . $this->image),
            'title' => $this->title,
            'description' => $this->description,
            'ingredient' => $this->ingredient,
            'direction' => $this->direction,
            'comments' => CommentResource::collection($this->comments)
        ];
    }
}
