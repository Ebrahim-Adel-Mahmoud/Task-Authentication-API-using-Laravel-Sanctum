<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function __construct(private UserService $userService) {}

    public function index()
    {
        $users = $this->userService->all();
        return $this->success($users,'SuccessFully All Users');
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userService->register($request->validated());
        return $this->success($user, 'User registered successfully');
    }

    public function login(LoginRequest $request)
    {
        $user = $this->userService->login($request->email, $request->password);

        if (!$user) {
           return $this->error('Invalid credentials');
        }

       return $this->success($user, 'User logged in successfully');

    }

    public function logout()
    {
        $user = $this->userService->logout();
        if(!$user) {
            return $this->error('User not found');
        }
        return $this->success($user, 'User logged out successfully');
    }

}
