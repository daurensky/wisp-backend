<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['success' => false], 401);
        }

        $token = $user->createToken('electron')->plainTextToken;

        return response()->json([
            'success' => true,
            'token'   => $token
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json(['success' => true]);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $attributes = $request->validated();

        if (!$attributes['name']) {
            $attributes['name'] = $attributes['username'];
        }

        $user = User::create($attributes);

        $token = $user->createToken('electron')->plainTextToken;

        return response()->json([
            'success' => true,
            'token'   => $token
        ]);
    }
}
