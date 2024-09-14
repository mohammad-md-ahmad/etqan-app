<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Data\Auth\RegisterUserRequest;

class AuthController extends Controller
{
    public function registerUser(RegisterUserRequest $request)
    {
        $user = User::create($request->all());

        if ($user) {
            return 'created';
        }
    }
}
