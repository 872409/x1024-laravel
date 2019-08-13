<?php


namespace X1024\Laravel\Http;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\JsonResponse;
use X1024\Laravel\Exceptions\ExceptionTrait;

class APIResponse extends JsonResponse
{
    use ExceptionTrait;

    public function api($data = null, $message = 'ok', $errorCode = 1)
    {
        $json = [
            'code' => $errorCode,
            'msg'  => $message,
        ];

        if ($data) {
            $json['data'] = $data;
        }

        return $this->setData($json)->setStatusCode(200)->send();
    }

    public function error($message, $errorCode = -1, $data = null)
    {
        return $this->api($data, $message, $errorCode);
    }

    public function errorSilent($message, $data = null)
    {
        return $this->api($data, $message, -1000);
    }

    public function page($data)
    {
        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        }

        $data = array_only($data, ['data', 'current_page', 'title', 'title_sub']);

        return $this->api($data);
    }


}