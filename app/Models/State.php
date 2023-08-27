<?php

namespace App\Models;

use DeepCopy\DeepCopy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class State extends Model
{
    use HasFactory, HasRelationships;

    public $timestamps = false;

    public function towns(): HasMany
    {
        return $this->hasMany(Town::class);
    }

    public function districts(): HasManyThrough
    {
        return $this->hasManyThrough(District::class, Town::class);
    }

    public function branches(): HasManyDeep
    {
        return $this->hasManyDeep(Branch::class, [Town::class, District::class]);
    }

    public function owners(): HasManyDeep
    {
        return $this->hasManyDeep(Owner::class, [Town::class, DeepCopy::class]);
    }
}
