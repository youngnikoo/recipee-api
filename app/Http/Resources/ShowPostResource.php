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
        $descriptions = str_replace("\r\n", " ", $this->description);
        $directions = str_replace("\r\n", "", $this->direction);
        $ingredients = str_replace("\r\n", "", $this->ingredient);

        return [
            'id' => $this->id,
            'image' => asset('storage/' . $this->image),
            'title' => $this->title,
            'description' => $descriptions,
            'ingredient' => explode(',', $ingredients),
            'direction' => explode(',', $directions),
            'comments' => CommentResource::collection($this->comments)
        ];
    }
}
