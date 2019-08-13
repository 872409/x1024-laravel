<?php


namespace X1024\Laravel\Http;


use Illuminate\Contracts\Support\Arrayable;

class APIResponseHelper
{
    public static function api($data = null, $message = 'ok', $errorCode = 1)
    {
        $response = new APIResponse();
        return $response->api($data, $message, $errorCode);
    }

    public static function error($message, $errorCode = -1, $data = null)
    {
        $response = new APIResponse();
        return $response->error($message, $errorCode, $data);
    }

    public static function page($data)
    {
        $response = new APIResponse();
        return $response->page($data);
    }
}