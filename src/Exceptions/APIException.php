<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 2018/7/1
 * Time: 15:28
 */

namespace X1024\Laravel\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Throwable;
use X1024\Laravel\Http\APIResponse;

class APIException extends Exception
{
    public $data;

    public function __construct(string $message = "", int $code = 0, $data = null, Throwable $previous = null)
    {
        $this->data = $data;
        parent::__construct($message, $code, $previous);
    }

    public function render(Request $request)
    {
        $response = new APIResponse();
        return $response->error($this->message, $this->code, $this->data);
    }

}