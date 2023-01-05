<?php

namespace Karim007\BoomcastSmsLaravel;

use Illuminate\Support\ServiceProvider;
use Karim007\BoomcastSmsLaravel\Sms\BoomCast;

class BoomcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . "/../config/boomcast.php" => config_path("boomcast.php")
        ]);
    }

    /**
     * Register application services
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/boomcast.php", "boomcast");

        $this->app->bind("boomcast", function () {
            return new BoomCast();
        });
    }
}
