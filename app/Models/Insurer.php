<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Insurer extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
    public function branches(): MorphMany
    {
        return $this->morphMany(Branch::class, 'branchable');
    }

    public function users(): MorphMany
    {
        return $this->morphMany(User::class, 'belongable');
    }
}
