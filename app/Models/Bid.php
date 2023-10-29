<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bid extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(BidStatus::class, 'bid_status_id');
    }

    public function details(): HasMany
    {
        return $this->hasMany(BidDetails::class);
    }
}
