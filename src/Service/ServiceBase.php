<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2018/6/25
 * Time: 19:55
 */

namespace X1024\Laravel\Services;


use X1024\Exceptions\ExceptionTrait;
use X1024\Utils\AuthTrait;

class ServiceBase
{
    use AuthTrait;
    use ExceptionTrait;

    public $now;

    public function __construct()
    {
        $this->now = now();
    }

    public function instance()
    {
        return $this;
    }


}