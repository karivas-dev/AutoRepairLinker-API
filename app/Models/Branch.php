<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Znck\Eloquent\Relations\BelongsToThrough;
use Znck\Eloquent\Traits\BelongsToThrough as BelongsToThroughTrait;

class Branch extends Model
{
    use HasFactory, BelongsToThroughTrait;

    protected $guarded = ['id'];

    public function branchable(): MorphTo
    {
        return $this->morphTo();
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function town(): BelongsToThrough
    {
        return $this->belongsToThrough(Town::class, District::class);
    }

    public function state(): BelongsToThrough
    {
        return $this->belongsToThrough(State::class, [Town::class, District::class]);
    }
}
