<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return response()->json(['message' => 'registration successful']);
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',],
        ], [
            'password.regex' => 'The password must have at least one capital letter, one number, and one symbol',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::where('email', $request->email)->first();

        if (!$user) {

            return response()->json(['status' => 404, 'message' => 'Email not registered'], 404);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $user->role;
            return response()->json(['data' => $user, 'token' => $token]);
        } else {
            return response()->json(['status' => 401, 'message' => 'Password wrong'], 401);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status' => 200, 'message' => "logged out successfully"], 200);
    }
    public function getInfo(Request $request)
    {
        $user = $request->user();
        return response()->json(['status' => 200, 'data' => $user], 200);
    }

    public function updateInfoUser(Request $request)
    {
        $user = $request->user();
        $user->update($request->all());

        return response()->json(["status" => 200, "message" => "User info updated successfully"]);
    }
}
