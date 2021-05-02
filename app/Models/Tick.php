<?php

namespace App\Models;

use App\Transformers\Transactions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tick extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'related_type',
        'related_id',
        'created_by',
    ];

    public function tickable(): MorphTo
    {
        return $this->morphTo();
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(TickTransaction::class);
    }

    public function getTransactions(): Transactions
    {
        return new Transactions($this->transactions()->get());
    }
}
