<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

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
            'bids' => $this->ifLoaded('bids', fn ($b) => $b->map(fn ($bid) => $bid->id)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }

    protected function ifLoaded($relationship, $callback)
    {
        $loadedRelation = $this->whenLoaded($relationship);
        if (! $loadedRelation instanceof MissingValue) {
            return $callback($loadedRelation);
        }

        return $loadedRelation;
    }
}
