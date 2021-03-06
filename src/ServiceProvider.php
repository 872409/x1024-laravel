<?php


namespace X1024\Laravel;

use X1024\Laravel\Services\ServiceContainer;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    //$ php artisan vendor:publish --provider="X1024\\Laravel\\ServiceProvider" --tag=config

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/config/x1024.php' => config_path('x1024.php'),
            ], 'config');

//            $this->commands([
//            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
    }

    /**
     * Register Services.
     *
     * @return void
     */
    protected function registerServices()
    {
        $serviceContainer = config('x1024.service.container');
        try {
            $obj = new $serviceContainer($this->app);
//
            if ($obj instanceof ServiceContainer) {
                $obj->register();
            }

        } catch (\Exception $exception) {

        }
    }
}