<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
