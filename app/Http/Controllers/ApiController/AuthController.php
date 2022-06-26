<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    function register(Request $request) {
        $field = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'tyoe' => 'required|integer'
        ]);

        $user = User::create([
            'name' => $field['name'],
            'email' => $field['email'],
            'password' => bcrypt($field['password']),
            'tyoe' => $field['tyoe'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    function login(Request $request) {
        $field = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email',$field['email'])->first();

        if(!$user || !Hash::check($field['password'], $user->password)) {
            return response([
                'message' => 'user tidak valid'
            ]);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);

    }
}
