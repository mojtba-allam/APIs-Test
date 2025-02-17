<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponses;
use App\Http\Requests\ApiLoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(ApiLoginRequest $request){
        return $this->ok($request->get('email'));
    }

    public function register( ){
        return $this->ok('Register Successfully');
    }
}
