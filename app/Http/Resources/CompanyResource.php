<?php

namespace App\Http\Resources;

use App\Http\Resources\ContactResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "address" => $this->address,
            "town_city" => $this->town_city,
            "region_county" => $this->region_county,
            "country_code" => $this->country_code,
            "post_code" => $this->post_code,
            "contacts" => ContactResource::collection($this->contacts)
        ];
    }
}
