<?php


namespace X1024\Laravel\Utils;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Locker
{
    public static function lock($lock, int $lockSec, \Closure $callable)
    {
        return Cache::lock($lock, $lockSec)->get($callable);
    }

    public static function block($lock, int $lockSec, int $blockSec, \Closure $callable)
    {
        return Cache::lock($lock, $lockSec)->block($blockSec, $callable);
    }

    public static function blockTransaction($lock, int $lockSec, int $blockSec, \Closure $callable, int $attempts = 1)
    {
        return static::block($lock, $lockSec, $blockSec, function () use ($callable, $attempts) {
            return DB::transaction($callable, $attempts);
        });
    }

    public static function lockTransaction($lock, int $lockSec, \Closure $callable, int $attempts = 1)
    {
        return Cache::lock($lock, $lockSec)->get(function () use ($callable, $attempts) {
            return DB::transaction($callable, $attempts);
        });
    }
}