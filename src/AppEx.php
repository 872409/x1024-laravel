<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2018/7/12
 * Time: 21:24
 */

namespace X1024\Laravel;


use Illuminate\Foundation\Http\Kernel;

class AppEx
{
    public static function kernelHandler(Kernel $kernel, $isAPI, $isAdmin)
    {
        $app = $kernel->getApplication();
        $app['__isAPI'] = $isAPI;
        $app['__isAdmin'] = $isAdmin;
    }

    public static function isAPI()
    {
        return app()['__isAPI'] ?? false;
    }

    public static function isAdmin()
    {
        return app()['__isAdmin'] ?? false;
    }
}