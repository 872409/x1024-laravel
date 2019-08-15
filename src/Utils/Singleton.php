<?php


namespace X1024\Laravel\Utils;


trait Singleton
{
    private static $instance;

    static function getInstance()
    {
        if (!isset(self::$instance)) {
            $args = self::getInstanceArgs();
            self::$instance = new static(...$args);
        }
        return self::$instance;
    }

    static function getInstanceArgs(): array
    {
        return [];
    }
}
