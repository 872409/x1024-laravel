<?php


namespace X1024\Laravel;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

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
//                CodeModelsCommand::class,
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
     * Register Model Factory.
     *
     * @return void
     */
    protected function registerServices()
    {

    }
}