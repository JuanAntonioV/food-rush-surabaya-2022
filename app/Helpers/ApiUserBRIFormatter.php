<?php

namespace App\Helpers;

class APIUserBRIFormatter
{
    //Untuk membuat Api userbri format pada Postman lebih enak dilihat
    protected static $response = [
        'code'  => null,
        'message'   => null,
        'token'     => null,
    ];

    public static function createApi($code = null, $message = null, $token = null)
    {
        self::$response['code'] = $code;
        self::$response['message'] = $message;
        self::$response['token'] = $token;

        return response()->json(self::$response, self::$response['code']);
    }
}
