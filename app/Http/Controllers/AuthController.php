<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\Sanctum;

class AuthController extends Controller
{

    // register a new user method
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    // login a user method

    public function login(Request $request)
    {
        // Validate the login request
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $client = User::where('email', $credentials['email'])->first();
            $token = $client->createToken('client-token')->plainTextToken;
            return response()->json([
                'token' => $token
            ], 200);
        } else {
            // Authentication failed
            return response()->json([
                'message' => 'Authentication error'
            ], 401);
        }
    }

    // logout a user method
    public function logout()
    {
        auth('web')->logout();
        //$request->session()->invalidate();
        //$request->session()->regenerateToken();
        return response()->json(['message' => 'Logged out successfully!'], 200);
    }

    // get the authenticated user method
    public function user(Request $request)
    {
        return new UserResource($request->user());
    }
}
