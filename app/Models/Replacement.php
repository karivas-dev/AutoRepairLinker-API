<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Replacement extends EloquentModel
{
    use HasFactory;
    protected $guarded = ['id'];

    public $timestamps = false;

    public function inventory(): HasOne
    {
        return $this->hasOne(Inventory::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }
}
