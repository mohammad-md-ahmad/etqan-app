<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function registerUser(RegisterUserRequest $request)
    {
        try {
            $password = Hash::make($request->password);
            $user = new User();

            $user->fill($request->all());
            $user->password = $password;

            return response()->json(['message' => 'success'], Response::HTTP_CREATED);
        } catch (Exception $exception) {
            Log::error(self::class . '::' . __FUNCTION__ . ':' . $exception->getMessage());

            return response()->json(['message' => 'something went wrong'], Response::HTTP_BAD_REQUEST);
        }
    }
}
