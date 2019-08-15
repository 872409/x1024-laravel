<?php
/**
 * Created by PhpStorm.
 * User: x
 * Date: 27/08/2017
 * Time: 17:34
 */

namespace X1024\Laravel\Exceptions;

use Exception;

class AppException extends Exception
{
    public $errors;
    public $data;
    public $app_code;
    public $is_json;

    public function __construct($errors = null, $code = 1, $data = null, $is_json = false)
    {
        $this->errors = $errors;
        $this->data = $data;
        $this->app_code = $code;
        $this->is_json = $is_json;
        parent::__construct($errors, $code, null);
    }


}