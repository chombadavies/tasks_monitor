<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessTokenResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        // Attempt to authenticate user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            // Create token and get plain text token
            $tokenResult = $user->createToken('MyApp');
            $plainTextToken = $tokenResult->plainTextToken; // This is the token string
    
            return response()->json([
                'token' => $plainTextToken, // Return just the token string
                'role' => $user->role
            ], 200);
        }
    
        // Authentication failed
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    
    }
    

