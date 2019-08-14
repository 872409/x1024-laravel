<?php


namespace X1024\Laravel\Services;


use Closure;

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
        $services = $this->getRegisterServices();

        if ($services && is_array($services)) {

            foreach ($services as $key => $service) {

                if (is_string($key)) {
                    $name = $key;

                    if ($service instanceof Closure) {
                        $concrete = $service;
                    }


                } else {
                    $name = class_basename($service);
                }

                if (!isset($concrete)) {
                    $concrete = function ($app) use ($service) {
                        return new $service($app);
                    };
                }

                $app->singleton($name, $concrete);

            }
        }
    }

    protected function getRegisterServices()
    {
        return $this->services;
    }

    protected static function getService($name, $arguments)
    {
        return app($name, $arguments);
    }


    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return static::getService($name, $arguments);
    }
}
