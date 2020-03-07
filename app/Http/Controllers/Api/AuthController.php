<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors()
            ], 422);
        }

        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->toArray());

        return response([
            'user' => $user
        ], 200);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', request('email'))->first();

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('token-name');

            return response([
                'user' => $user,
                'token' => $token->plainTextToken
            ], 200);
        } else {
            return response([
                'errors' => [
                    'password' => 'password missmatch'
                ]
            ], 422);
        }
    }
}
