<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BidReplacementResource extends JsonResource
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
            'bid_id' => $this->bid_id,
            'replacement' => ReplacementResource::make($this->replacement),
            'price' => $this->price,
            'quantity' => $this->quantity,
        ];
    }
}
