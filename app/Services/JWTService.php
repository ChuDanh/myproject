<?php

namespace App\Services;
use App\Repositories\UserRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTService
{
    protected $userRepository;
    protected $jwt;

    public function __construct(UserRepository $userRepository, JWTAuth $jwt)
    {
        $this ->userRepository = $userRepository;
        $this ->jwt = $jwt;
    }

    public function authenticate($email,$password)
    {
        $user = $this->userRepository->authenticate($email, $password);
        if (!$user) {
            return false;
        }

        return $this->jwt->fromUser($user);
    }
}
