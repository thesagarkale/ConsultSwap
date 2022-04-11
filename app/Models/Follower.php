<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Follower extends Model implements ModelInterface
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'follower_id',
        'followed_at',
        'unfollowed_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function follower(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'follower_id');
    }
}
