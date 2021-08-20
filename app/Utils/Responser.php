<?php
namespace App\Utils;

class Responser{
    static private function make(Int $code, String $message, String $data = null){
        $contentResponse = [
            'message' => $message
        ];

        if($data) $contentResponse['data'] = $data;

        return response()->json($contentResponse,$code);
    }

    static public function created(String $message = 'Created', Int $code = 201){
        return self::make($code,$message);
    }
}