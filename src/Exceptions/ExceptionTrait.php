<?php


namespace X1024\Laravel\Exceptions;


trait ExceptionTrait
{
    public function throwAPIError($message, $code = -1, $data = null)
    {
        throw new APIException($message, $code, $data);
    }
}