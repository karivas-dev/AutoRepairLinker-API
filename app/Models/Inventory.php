<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function replacement(): BelongsTo
    {
        return $this->belongsTo(Replacement::class);
    }
}
