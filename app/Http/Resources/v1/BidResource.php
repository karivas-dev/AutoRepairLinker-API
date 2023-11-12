<?php

namespace App\Http\Resources\v1;

use App\Models\BidReplacement;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BidResource extends JsonResource
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
            'status' => $this->whenLoaded('status'),
            'timespan' => $this->timespan,
            'budget' => $this->budget,
            'details' => BidDetailsResource::collection($this->whenLoaded('details')),
            'replacements' => BidReplacementResource::collection($this->whenLoaded('replacements')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
