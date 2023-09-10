<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Pest\Laravel\json;

class AuthController extends Controller
{
    /**
     * Authenticates the user and generates a new token.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:100'
        ]);

        if (Auth::attempt($attributes)) {
            return response()->json([
                'token' => $request->user()->createToken($request->email)->plainTextToken,
                'message' => 'Authenticated'
            ]);
        }

        return response()->json([
            'message' => 'Unauthenticated'
        ], 401);
    }

    /**
     * Destroys the token for the authenticated user.
     */
    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Session closed'
        ]);
    }
}
