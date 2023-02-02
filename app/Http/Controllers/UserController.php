<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Services\JWTService;
class UserController
{

    protected $userService;

    protected $jwtService;

    public function __construct(UserService $userService, JWTService $jwtService)
    {
        $this->userService = $userService;

        $this->jwtService = $jwtService;
    }

    public function register(Request $request)
    {
        $user = $this->userService->register($request->all());
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }

    public function login(Request $request)
    {
        $token = $this->jwtService->authenticate($request->input('email'), $request->input('password'));
        if (!$token) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json(['token' => $token]);
    }
}
