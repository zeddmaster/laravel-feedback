<?php

namespace Zeddmaster\LaravelFeedback\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'feedback_type_id',
        'content'
    ];

    protected $casts = [
        'content' => 'json'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(FeedbackType::class, 'feedback_type_id');
    }
}