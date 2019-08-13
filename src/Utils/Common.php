<?php


namespace X1024\Laravel\Utils;


use Illuminate\Http\Request AS HttpReqeust;
use Illuminate\Support\Facades\Request;

class Common
{
    public static function setTrueValue(&$array, $key, $value)
    {
        if ($value) {
            $array[$key] = $value;
        }
    }

    public static function array_key_replace(array &$array, $key_values)
    {
        foreach ($key_values as $key => $value) {
            if (isset($array[$key])) {
                $array[$value] = $array[$key];
                unset($array[$key]);
            }
        }

    }
}
