<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2018/11/18
 * Time: 00:14
 */

namespace X1024\Laravel\Log;

use Monolog\Logger as MonologLogger;

class Logger
{
    public function __invoke(array $config)
    {
        $monolog = new MonologLogger('X');
        $filename = storage_path('logs/' . php_sapi_name() . '-' . posix_getpwuid(posix_geteuid())['name'] . '.log');
        $monolog->pushHandler($handler = new \Monolog\Handler\RotatingFileHandler($filename, 30));
        $handler->setFilenameFormat('laravel-{date}-{filename}', 'Y-m-d');
        $formatter = new \Monolog\Formatter\LineFormatter(null, null, true, true);
        $formatter->includeStacktraces();
        $handler->setFormatter($formatter);
        return $monolog;
    }
}