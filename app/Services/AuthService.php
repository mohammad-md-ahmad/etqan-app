<?php

namespace App\Services;

use App\Contracts\AuthServiceInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

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

    public function authenticate(LoginRequest $request): bool
    {
        try{
            $sessionAttributes = array_keys(Session::all());
            Session::forget($sessionAttributes);

            if (! Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
                throw ValidationException::withMessages([trans('Username or Password is incorrect')]);
            }

            $request->hasSession() ? $request->session()->regenerate() : null;

            return true;
        } catch (Exception $exception) {
            Log::error(self::class . '::' . __FUNCTION__ . ':' . $exception->getMessage());

            throw $exception;
        }
    }
}
