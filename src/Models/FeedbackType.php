<?php

namespace Zeddmaster\LaravelFeedback\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeedbackType extends Model
{
    protected $table = 'feedback_types';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'emails',
        'subject',
        'content',
        'blade_template',
    ];

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class, 'feedback_type_id');
    }

    public function fields(): HasMany
    {
        return $this->hasMany(FeedbackField::class, 'feedback_type_id');
    }

}