<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'district_id' => $this->district_id,
            'cars' => CarResource::collection($this->whenLoaded('cars')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
