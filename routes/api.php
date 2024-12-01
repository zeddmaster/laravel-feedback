<?php

use Illuminate\Support\Facades\Route;
use Zeddmaster\LaravelFeedback\Http\Controllers\FeedbackController;



Route::middleware('api')->prefix('api')->group(function() {

    $url = config('feedback.route.url');
    $name = config('feedback.route.name');
    $prefix = trim($url, '/ ');

    Route::post("$prefix/{slug}", FeedbackController::class)->name($name);
});
