<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BidStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);
    }
}
