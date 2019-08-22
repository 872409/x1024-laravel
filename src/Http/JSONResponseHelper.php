<?php


namespace X1024\Laravel\Http;


use X1024\Laravel\Exceptions\AppException;

class JSONResponseHelper
{
    public static function json($data = null, $message = 'ok', $errorCode = 1)
    {
        $response = new JSONResponse();
        return $response->json($data, $message, $errorCode);
    }

    public static function error($message, $errorCode = -1, $data = null)
    {
        $response = new JSONResponse();
        return $response->error($message, $errorCode, $data);
    }

    public static function page($data)
    {
        $response = new JSONResponse();
        return $response->page($data);
    }

    public static function exception(\Exception $exception)
    {
        $data = isset($exception->data) ? $exception->data : null;
        return self::error($exception->getMessage(), $exception->getCode(), $data);
    }
}