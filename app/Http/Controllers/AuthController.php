<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        $client = Client::where('email', $request->input('email'))->first();

        if ($client) {
            echo "Ya existe el usuario con ese email";
        } else {
            $client = new Client();
            $client->name = $request->input('name');
            $client->email = $request->input('email');
            $client->password = $request->input('password');
            $client->remember_token = $user->createToken('auth_token')->plainTextToken;
            $client->save();
        }

        $user -> remember_token = $client -> remember_token;
        $user -> save();

        return response()->json(['token' => $client->remember_token], 200);
    }

    // login a user method

    public function login(Request $request)
    {
        // Validate the login request
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $client = User::where('email', $credentials['email'])->first();
            $token = $client->remember_token;
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

    public function logout()
    {
        auth('web')->logout();
        Session::flush();
        return response()->json(['status' => true, 'message' => 'logged out']);
    }

    public function user()
    {
        return response()->json(['status' => true, 'user' => auth()->user()]);
    }
}
