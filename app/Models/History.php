<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'user_id', 'balance_id', 'bill_id', 'monthly_id', 'total'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function balance(): BelongsTo {
        return $this->belongsTo(Balance::class);
    }
    public function monthly(): BelongsTo {
        return $this->belongsTo(Monthly::class);
    }
    public function bill(): BelongsTo {
        return $this->belongsTo(Bill::class);
    }
    public function monthlyType(): BelongsTo {
        return $this->belongsTo(MonthlyType::class);
    }
    public function billType(): BelongsTo {
        return $this->belongsTo(BillType::class);
    }
}
