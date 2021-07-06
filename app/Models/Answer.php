<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'answer',
        'question_id',
        'answered_by',
    ];

    protected $hidden = [
        'question_id',
        'answered_by',
        'updated_at',
        'deleted_at',
    ];

    protected $with = ['tick.transactions'];

    public function answerer(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'answered_by');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function tick(): MorphOne
    {
        return $this->morphOne(Tick::class, 'related');
    }
}
