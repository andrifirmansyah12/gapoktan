<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FarmerResource extends JsonResource
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
            "user_id" =>new UserResource($this->user),
            "poktan_id" =>new PoktanResource($this->poktan),
            "city" => $this->city,
            "address" => $this->address,
            "telp" => $this->telp,
            "is_active" => $this->is_active,
        ];
    }
}
