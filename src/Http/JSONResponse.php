<?php


namespace X1024\Laravel\Http;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\JsonResponse as Response;

class JSONResponse extends Response
{

    public function json($data = null, $message = 'ok', $errorCode = 1)
    {
        $json = [
            'code' => $errorCode,
            'msg'  => $message,
        ];

        if ($data !== null) {
            $json['data'] = $data;
        }

        return $this->setData($json)->setStatusCode(200)->send();
    }

    public function error($message, $errorCode = -1, $data = null)
    {
        return $this->json($data, $message, $errorCode);
    }

    public function errorSilent($message, $data = null)
    {
        return $this->json($data, $message, -1000);
    }

    public function page($data)
    {
        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        }

        $data = array_only($data, ['data', 'current_page', 'title', 'title_sub']);

        return $this->json($data);
    }


}