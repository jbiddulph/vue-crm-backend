<?php

namespace App\Http\Resources;

use App\Http\Resources\ContactResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtworkResource extends JsonResource
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
            "id" => $this->id,
            "title" => $this->title,
            "size" => $this->size,
            "category" => $this->category,
            "artist_notes" => $this->artist_notes,
            "is_featured" => $this->is_featured,
            "is_live" => $this->is_live,
            "on_sale" => $this->on_sale,
            "price" => $this->price,
            "file" => $this->file,
            "created_at" => $this->created_at,
            "contact" => new ContactResource($this->whenLoaded('contact')),
        ];
    }
}
