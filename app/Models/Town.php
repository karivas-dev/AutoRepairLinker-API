<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Town extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function branches(): HasManyThrough
    {
        return $this->hasManyThrough(Branch::class, District::class);
    }

    public function owners(): HasManyThrough
    {
        return $this->hasManyThrough(Owner::class, District::class);
    }
}
