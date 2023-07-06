<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BillType extends Model
{
    use HasFactory;

    public function bill(): HasMany {
        return $this->hasMany(Bill::class);
    }

    public function history(): HasMany {
        return $this->hasMany(History::class);
    }
}
