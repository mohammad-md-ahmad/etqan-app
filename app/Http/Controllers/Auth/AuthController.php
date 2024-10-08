<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\AuthServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct(
        protected AuthServiceInterface $authService
    ) {
    }

    public function registerUser(RegisterUserRequest $request)
    {
        try {
            $user = $this->authService->registerUser($request);

            return response()->json(['message' => 'success'], Response::HTTP_CREATED);
        } catch (Exception $exception) {
            Log::error(self::class . '::' . __FUNCTION__ . ':' . $exception->getMessage());

            return response()->json(['message' => 'something went wrong'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $this->authService->login($request);

            return redirect('/');
        } catch (Exception $exception) {
            Log::error(self::class . '::' . __FUNCTION__ . ':' . $exception->getMessage());

            return response()->json(['message' => 'something went wrong'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->authService->logout($request);

            return true;
        } catch (Exception $exception) {
            Log::error(self::class . '::' . __FUNCTION__ . ':' . $exception->getMessage());

            return response()->json(['message' => 'something went wrong'], Response::HTTP_BAD_REQUEST);
        }
    }
}
