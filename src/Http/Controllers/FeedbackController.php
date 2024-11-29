<?php

namespace Zeddmaster\LaravelFeedback\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Zeddmaster\LaravelFeedback\Models\FeedbackField;
use Zeddmaster\LaravelFeedback\Models\FeedbackType;

class FeedbackController
{
    public function __invoke(Request $request, string $slug): JsonResponse
    {
        $feedbackType = FeedbackType::whereSlug($slug)->first();

        $content = $this->validate($request, $feedbackType);
        $feedback = $feedbackType->feedbacks()->create(compact('content'));

        return response()->json(
            compact('feedback')
        );
    }

    protected function validate(Request $request, FeedbackType $feedbackType): array
    {
        $rules = [];
        $fields = $feedbackType->fields()->get();

        /** @var FeedbackField $field */
        foreach($fields as $field)
            $rules[$field->slug] = $field->validation ?? 'nullable';

        return $request->validate($rules);
    }

}