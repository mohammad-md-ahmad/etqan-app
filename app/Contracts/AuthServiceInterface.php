<?php

namespace App\Contracts;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;

interface AuthServiceInterface
{
    public function registerUser(RegisterUserRequest $request): User;
}
