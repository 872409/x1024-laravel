<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2018/6/25
 * Time: 19:55
 */

namespace X1024\Laravel\Services;



class ServiceBase
{

    /**
     * @var \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application $app
     */
    protected $app;
    public $now;

    /**
     * ServiceBase constructor.
     * @param \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|null $app
     */
    public function __construct($app = null)
    {
        $this->app = $app;
        $this->now = now();
    }

    public function instance()
    {
        return $this;
    }


}
