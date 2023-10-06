<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
            'email' => $this->email,
            'telephone' => $this->telephone,
            'main' => $this->main,
            'district_id' => $this->district_id,
            'branchable_id' => $this->branchable_id,
            'created_at' => $this->created_at,
        ];
    }
}
