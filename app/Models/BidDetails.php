<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BidDetails extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function bid(): BelongsTo
    {
        return $this->belongsTo(Bid::class);
    }
}
