<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;

trait HasApiResponse
{
    protected static $response = [
        'meta' => [
            'status' => true,
            'code'   => 200,
            'message'=> 'ok'
        ],
        'result' => null
    ];

    public function responseSuccess($data = null, $message = '')
    {
        self::$response['meta']['message']  = $message;
        self::$response['result']           = $data;
        return response()->json(self::$response, self::$response['meta']['code']);
    }

    public function responseSuccessNoStucture($data = null, $message = '')
    {
        self::$response['meta']['message']  = $message;
        self::$response['result']           = $data;
        return response()->json($data, self::$response['meta']['code']);
    }

    public function responseError($data = null, $message = 'Something Went Wrong', $code = 500)
    {
        self::$response['meta']['code']     = $code;
        self::$response['meta']['status']   = false;
        self::$response['meta']['message']  = $message;
        self::$response['result']           = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    public function responseValidation($data = null, $message = 'Validation Error',  $code = 422)
    {
        self::$response['meta']['code']     = $code;
        self::$response['meta']['status']   = false;
        self::$response['meta']['message']  = $message;
        self::$response['result']           = $data;

        throw new HttpResponseException(response()->json(self::$response, self::$response['meta']['code']));
    }
}
