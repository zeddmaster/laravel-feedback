<?php

use Illuminate\Support\Facades\Route;
use Zeddmaster\LaravelFeedback\Http\Controllers\FeedbackController;

$url = config('feedback.route.url');
$name = config('feedback.route.name');
$prefix = trim($url, '/ ');

$route = Route::post("$prefix/{slug}", FeedbackController::class)->name($name);
