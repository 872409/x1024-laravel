<?php


namespace X1024\Laravel\Utils;


class TypeHelper
{
    public static function fromPrice($value)
    {
        return floatval(bcdiv($value, 100, 2));//round(bcdiv($value, 100, 2), 2);
    }

    public static function toPrice($value)
    {
        return $value * 100;
    }

}