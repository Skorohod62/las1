<?php

namespace Revalto\ModelCache\Providers;

use Illuminate\Support\ServiceProvider;

class CacheableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/model-cache.php', 'model-cache'
        );

        $this->publishes([
            __DIR__ . '/../../config/model-cache.php' => config_path('model-cache.php')
        ]);
    }
}