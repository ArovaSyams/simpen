<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'bill_type_id', 'nominal'
    ];
 
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function billType(): BelongsTo {
        return $this->belongsTo(BillType::class);
    }

    public function history(): HasMany {
        return $this->hasMany(History::class);
    }
}
