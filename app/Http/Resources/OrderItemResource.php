<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            "id"  => $this->orderItems->id,
            // "order_id"  => $this->order_id,
            // "product_id" => $this->product_id,
            // "qty" => $this->qty,
            // "price" => $this->price,
            // "created_at" => $this->created_at,
            // "updated_at" => $this->updated_at
        ];
    }
}
