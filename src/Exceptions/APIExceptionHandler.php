<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 04/12/2017
 * Time: 14:24
 */

namespace X1024\Laravel\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use X1024\Laravel\Http\APIResponseHelper;

class APIExceptionHandler
{
    public static function render($request, Exception $exception)
    {

        if ($exception instanceof AuthenticationException) {
            return static::renderAuthentication($request, $exception);
        } else if ($exception instanceof JWTException) {
            return static::JWT($exception);
        } else if ($exception instanceof \Illuminate\Validation\ValidationException) {
            return static::Validation($request, $exception);
        } else if ($exception instanceof ModelNotFoundException) {
            return APIResponseHelper::error('', -404);
        }

        return APIResponseHelper::error($exception->getMessage(), $exception->getCode());
    }

    public static function renderAuthentication($request, AuthenticationException $exception)
    {
        $config = config('api.errors.Unauthenticated');
        return APIResponseHelper::error($config['msg'], $config['code']);
    }


    public static function Validation($request, ValidationException $exception)
    {

        $errorMsg = array_values($exception->errors())[0];

        if (is_array($errorMsg)) {
            $message = array_values($errorMsg)[0];
        } elseif (is_string($errorMsg)) {
            $message = $errorMsg;
        } else {
            $message = '';
        }

        return APIResponseHelper::error($message, config('api.errors.request_params_error'));
    }

    public static function JWT(JWTException $exception)
    {
        $code = $exception->getStatusCode();

        switch ($code) {
            case 400:
                $code = config('apicode.auth.token_invalid');
                break;
            case 401:
                $code = config('apicode.auth.token_expire');
                break;
            default:
                $code = config('apicode.auth.token_error');
                break;
        }

        return APIResponseHelper::error(__('apicode.error.' . $code));
    }

}