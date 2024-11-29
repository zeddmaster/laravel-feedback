<?php

namespace Zeddmaster\LaravelFeedback\Providers;

use Illuminate\Support\ServiceProvider;

class FeedbackServiceProvider extends ServiceProvider
{

    protected array $commands = [
        //
    ];

    public function boot(): void
    {
        // migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // configs
        $configPath = __DIR__ . '/../../config/feedback.php';
        $this->publishes([
            $configPath => config_path('feedback.php'),
        ]);
        $this->mergeConfigFrom($configPath, 'feedback');

        // routes
        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');

        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }
}