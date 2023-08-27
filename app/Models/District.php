<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Znck\Eloquent\Relations\BelongsToThrough;
use Znck\Eloquent\Traits\BelongsToThrough as BelongsToThroughTrait;

class District extends Model
{
    use HasFactory, BelongsToThroughTrait;

    public $timestamps = false;

    public function town(): BelongsTo
    {
        return $this->belongsTo(Town::class);
    }

    public function state(): BelongsToThrough
    {
        return $this->belongsToThrough(State::class, Town::class);
    }

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    public function owners(): HasMany
    {
        return $this->hasMany(Owner::class);
    }
}
