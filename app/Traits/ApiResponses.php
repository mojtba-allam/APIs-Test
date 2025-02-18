<?php

namespace App\Traits;

trait ApiResponses
{
    public function ok($message , $data =[]){
        return $this->success($message, 200, $data);
    }

    public function success($message , $statusCode = 200, $data =[]){
        return response()->json([
            'message' => $message,
            'status' => $statusCode,
            'data' => $data
        ], $statusCode);
    }

        public function error($message , $statusCode){
        return response()->json([
            'message' => $message,
            'status' => $statusCode
        ], $statusCode);
    }
}
