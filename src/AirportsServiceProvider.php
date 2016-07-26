<?php

namespace LArtie\Airports;

use Illuminate\Support\ServiceProvider;
use LArtie\Airports\Console\Commands\AirportInstall;

class AirportsServiceProvider extends ServiceProvider
{
    /**
     * List of artisan commands
     * @var array
     */
    protected $commands = [
        AirportInstall::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../resources/' => resource_path('assets')
        ], 'assets');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
