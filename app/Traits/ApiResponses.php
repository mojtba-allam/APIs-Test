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

        public function error($errors =[] , $statusCode =null){
        if (is_string($errors)){
        return response()->json([
            'message' => $errors,
            'status' => $statusCode
        ], $statusCode);
        }

        return response()->json([
            'errors' => $errors
        ]);
    }

    protected function notAuthorized($message ){
        return $this->error([
            'status' => 401,
            'message' => $message,
            'source' => ''
        ]);
    }
}
