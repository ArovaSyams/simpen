<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'balance', 'pocket_money'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function history(): HasMany {
        return $this->hasMany(History::class);
    }

}