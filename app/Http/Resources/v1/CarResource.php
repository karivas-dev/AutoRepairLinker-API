<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'plates' => $this->plates,
            'serial_number' => $this->serial_number,
            'owner' => OwnerResource::make($this->whenLoaded('owner')),
            'model' => ModelResource::make($this->whenLoaded('model')),
            'branch_id' => $this->branch_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
