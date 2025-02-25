<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Permissions\V1\Abilities;
use App\Traits\ApiResponses;
use App\Http\Requests\Api\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginUserRequest $request){
        $request->validated($request->all());
        if(!Auth::attempt($request->only('email', 'password'))){
            return $this->error('Invalid credentials', 401);
        }

        $user = User::firstWhere('email', $request->email);
        return $this->ok('Authenticated', [
            'token' => $user->createToken(
                'API TOKEN '.$user->email,
                Abilities::getAbilities($user),
                now()->addMonth())->plainTextToken
        ]);
    }


    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return $this->ok('Logged out successfully');
    }
}
