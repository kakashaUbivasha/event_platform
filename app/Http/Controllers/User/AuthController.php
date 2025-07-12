<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response(['message' => 'Invalid credentials'], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        if(!$token)
        {
            return response(['message' => 'Error create token'], 501);
        }
        return response(['user' => $user, 'token' => $token]);
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        User::create($data);
        return response(['message' => 'User successfully registered'], 201);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response(['message' => 'User successfully logged out']);
    }
}
