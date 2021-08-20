<?php
namespace App\Utils;

class Responser{
    static private function make(Int $code, String $message, Array $data = null){
        $contentResponse = [
            'message' => $message
        ];

        if($data) $contentResponse['data'] = $data;

        return response()->json($contentResponse,$code);
    }

    static public function created(String $message = 'Created', Int $code = 201){
        return self::make($code,$message);
    }

    static public function badRequest(String $message = 'Bad request', Array $errors = [], Int $code = 400){
        return self::make($code,$message,$errors);
    }

    static public function unauthorized(String $message = 'Unauthorized', Int $code = 401){
        return self::make($code,$message);
    }

    static public function ok(String $message = 'Successful execution', Array $data = [], Int $code = 200){
        return self::make($code,$message,$data);
    }
}