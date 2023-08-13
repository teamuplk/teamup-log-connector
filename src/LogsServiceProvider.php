<?php

namespace Teamup\LogConnector;

use Illuminate\Support\ServiceProvider;

class LogsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPublishing();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        config(['logging.channels' => array_merge(config('logging.channels'), [
            'tup-log' => [
                'driver'  => 'custom',
                'via' => \Teamup\LogConnector\Services\TeamUpLogMonolog::class,
                'handler' => \Teamup\LogConnector\Services\TeamUpLogHandler::class,
                'level' => env('LOG_LEVEL', 'debug'),
            ],
        ])]);
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/tup-logs.php' => $this->app->configPath('tup-logs.php'),
            ], 'log-connector');
        }
    }
}
