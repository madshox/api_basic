<?php

namespace App\Services\Response;

class ResponseService
{
    private static function responseParams($status, $errors = [], $data = []) {
        return [
            'status' => $status,
            'errors' => (object) $errors,
            'data' => (object) $data,
        ];
    }

    static public function sendJsonReponse($status, $code = 200, $errors = [], $data = []) {
        return response()->json(
            self::responseParams($status, $errors, $data),
            $code
        );
    }

    static public function success($data = []) {
        return self::sendJsonReponse(true, 200, [], $data);
    }

    static public function notFound($data = []) {
        return self::sendJsonReponse(false, 404, [], []);
    }

}
