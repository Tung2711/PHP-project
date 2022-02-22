<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
    	 $credentials = request(['email', 'password']);


        if (! $token = auth()->attempt($credentials)) {
            return response()->json([
                'error' => [
                   'message' => 'Login failed',
                   'status' => false,
                   'code' => 401,
               ]
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function refresh()
    {   
        try{
             return $this->respondWithToken(auth()->refresh());
        } catch(\Exception $e){
            return response()->json([
                'error' => [
                   'message' => $e->getMessage(),
                   'status' => false,
                   'code' => 500,
               ]
           ]);
        }
    }

    public function logout()
    {
        auth()->logout();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => 'Successfully logged out'
        ]);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
