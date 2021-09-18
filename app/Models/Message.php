<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Message extends Model implements ModelInterface
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'message',
        'created_at',
        'updated_at',
    ];

    public function sender(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'from');
    }

    public function receiver(): HasOne
    {
        return $this->hasOne(User::class, 'id','to');
    }
}
