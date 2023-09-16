<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'user' => $this->whenLoaded('user'),
            'description' => $this->description,
            'garage' => $this->whenLoaded('garage'),
            'car' => CarResource::make($this->whenLoaded('car')),
            'branch' => $this->whenLoaded('branch'),
            'status' => $this->ticket_status->name,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
