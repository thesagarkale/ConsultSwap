<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TickTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'tick_id',
        'credit',
        'debit',
        'balance',
        'created_by',
        'expired_at',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
