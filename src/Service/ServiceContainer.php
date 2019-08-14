<?php


namespace X1024\Laravel\Services;


use Closure;

class ServiceContainer
{
    protected $singleton_services = [];
    protected $bind_services = [];

    /**
     * @var \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application $app
     */
    protected static $app;

//    private $_singletonServices = [];

    /**
     * ServiceContainer constructor.
     * @param \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application $app
     */
    public function __construct($app)
    {
        static::$app = $app;
    }


    /**
     */
    public function register()
    {
        if ($singletons = $this->getSingletonRegisterServices()) {
            $this->registerServices($singletons, 'registerSingleton');
        }


        if ($binds = $this->getBindRegisterServices()) {
            $this->registerServices($binds, 'registerBind');
        }
    }


    private function registerServices(array $services, string $registerMethod)
    {

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


            $this->{$registerMethod}($name, $concrete);
        }
    }

    protected function registerSingleton($name, $concrete)
    {
        static::$app->singleton($name, $concrete);
    }

    protected function registerBind($name, $concrete)
    {
        static::$app->bind($name, $concrete);
    }

    protected function getSingletonRegisterServices()
    {
        return $this->singleton_services;
    }

    protected function getBindRegisterServices()
    {
        return $this->bind_services;
    }

    protected static function getService($name, $arguments)
    {
        return static::$app->makeWith($name, $arguments);
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
