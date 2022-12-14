<?php

namespace App\Http\Resources;

use App\Http\Resources\NoteResource;
use App\Http\Resources\ArtworkResource;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "phone" => $this->phone,
            "address" => $this->address,
            "town_city" => $this->town_city,
            "region_county" => $this->region_county,
            "country_code" => $this->country_code,
            "post_code" => $this->post_code,
            "created_at" => $this->created_at,
            "company" => new CompanyResource($this->whenLoaded('company')),
            "notes" => NoteResource::collection($this->notes),
            "artworks" => ArtworkResource::collection($this->artworks)
        ];
    }
}
