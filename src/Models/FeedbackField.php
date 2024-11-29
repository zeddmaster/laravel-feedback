<?php

namespace Zeddmaster\LaravelFeedback\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedbackField extends Model
{
    protected $table = 'feedback_fields';

    protected $fillable = [
        'feedback_type_id',
        'title',
        'slug',
        'type',
        'validation',
    ];

    public $timestamps = false;

    public function feedbackType(): BelongsTo
    {
        return $this->belongsTo(FeedbackType::class, 'feedback_type_id');
    }
}