<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MonthlyType extends Model
{
    use HasFactory;

    public function monthly(): HasMany {
        return $this->hasMany(Monthly::class);
    }

    public function history(): HasMany {
        return $this->hasMany(History::class);
    }
}
