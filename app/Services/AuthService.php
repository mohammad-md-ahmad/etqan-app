<?php

namespace App\Services;

use App\Contracts\AuthServiceInterface;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthService implements AuthServiceInterface
{
    public function registerUser(RegisterUserRequest $request): User
    {
        try {
            $password = Hash::make($request->password);
            $user = new User();

            $user->fill($request->all());
            $user->password = $password;

            return $user;
        } catch (Exception $exception) {
            Log::error(self::class . '::' . __FUNCTION__ . ':' . $exception->getMessage());

            throw $exception;
        }
    }
}
