<?php

namespace App\Contracts;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;

interface AuthServiceInterface
{
    public function registerUser(RegisterUserRequest $request): User;

    public function authenticate(LoginRequest $request): bool;
}
