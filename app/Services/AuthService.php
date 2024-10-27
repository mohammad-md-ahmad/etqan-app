<?php

namespace App\Services;

use App\Contracts\AuthServiceInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
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

            $user->save();

            return $user;
        } catch (Exception $exception) {
            Log::error(self::class . '::' . __FUNCTION__ . ':' . $exception->getMessage());

            throw $exception;
        }
    }

    public function login(LoginRequest $request): bool
    {
        try {
            $sessionAttributes = array_keys(Session::all());
            Session::forget($sessionAttributes);

            if (! Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                throw ValidationException::withMessages([trans('Email or Password are incorrect!')]);
            }

            $request->hasSession() ? $request->session()->regenerate() : null;

            return true;
        } catch (Exception $exception) {
            Log::error(self::class . '::' . __FUNCTION__ . ':' . $exception->getMessage());

            throw $exception;
        }
    }

    public function logout(Request $request): bool
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return true;
        } catch (Exception $exception) {
            Log::error(self::class . '::' . __FUNCTION__ . ':' . $exception->getMessage());

            throw $exception;
        }
    }
}
