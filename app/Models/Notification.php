<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model implements ModelInterface
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'related_to',
        'related_id',
        'notification',
        'url',
        'read_at',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}