<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'answer',
        'question_id',
        'answered_by'
    ];

    public function answerer(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'answered_by');
    }
}
