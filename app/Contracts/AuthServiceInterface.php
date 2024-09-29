<?php

namespace App\Contracts;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

interface AuthServiceInterface
{
    public function registerUser(RegisterUserRequest $request): User;

    public function login(LoginRequest $request): bool;

    public function logout(Request $request): bool;
}
