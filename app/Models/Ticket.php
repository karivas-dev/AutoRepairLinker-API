<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Znck\Eloquent\Traits\BelongsToThrough;

class Ticket extends Model
{
    use HasFactory, BelongsToThrough, SoftDeletes;
    protected $guarded = ['id'];

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function insurer()
    {
        return $this->belongsToThrough(Insurer::class, [Branch::class, User::class], foreignKeyLookup: [Insurer::class => 'branchable_id']);
    }

    public function garage(): BelongsTo
    {
        return $this->belongsTo(Garage::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function ticket_status(): BelongsTo
    {
        return $this->belongsTo(TicketStatus::class);
    }
}
