<?php


namespace X1024\Laravel\Services;


class ServiceContainer
{
    protected $services = [];

    /**
     * @param \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application $app
     */
    public function register($app)
    {
        $this->registerServices($app);
    }


    /**
     * @param \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application $app
     */
    protected function registerServices($app)
    {
        if ($this->services && is_array($this->services)) {

            foreach ($this->services as $service) {
                $name = lcfirst(class_basename($service));

                $app->singleton($name, function ($app) use ($service) {
                    return new $service($app);
                });
            }
        }
    }

}