<?php

namespace Zeddmaster\LaravelFeedback\Test;


use Zeddmaster\LaravelFeedback\Models\Feedback;
use Zeddmaster\LaravelFeedback\Models\FeedbackType;

final class FeedbackTest extends FeatureTestCase
{


    public function testStoringFeedback(): void
    {

        $slug = 'test-type';

        /** @var FeedbackType $type */
        $type = FeedbackType::create([
            'name' => 'Test Type',
            'slug' => $slug,
            'description' => 'Type description',
            'emails' => 'example@mail.com,example1@mail.com',
            'subject' => 'Example subject',
            'content' => 'Some Content',
            'blade_template' => 'test.template.blade.php',
        ]);


        $type->fields()->create([
            'title' => 'Name',
            'slug' => 'name',
            'type' => 'string',
            'validation' => 'required|string',
        ]);

        $type->fields()->create([
            'title' => 'Phone',
            'slug' => 'phone',
            'type' => 'string',
            'validation' => 'required|string',
        ]);

        $type->fields()->create([
            'title' => 'E-Mail',
            'slug' => 'email',
            'type' => 'string',
            'validation' => 'required|string|email',
        ]);


        $response = $this->post(
            route('api.feedbacks.store', $slug),
            $this->getFeedbackData()
        );

        $response->assertStatus(200);
        $response->assertJson([
            'feedback' => [
                'content' => $this->getFeedbackData(),
                'feedback_type_id' => 1
            ]
        ]);

        $feedback = Feedback::find($response->json('feedback.id'));
        $this->assertSame($this->getFeedbackData(), $feedback->content);
    }

    private function getFeedbackData(): array
    {
        return [
            'name' => 'Test name',
            'phone' => '123456789',
            'email' => 'test@mail.com',
        ];
    }
}