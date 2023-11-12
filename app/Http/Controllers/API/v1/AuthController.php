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
                'type' => $request->user()->branch->branchable_type,
                'admin' => $request->user()->isAdmin,
                'message' => 'Authenticated'
            ]);
        }

        return response()->json([
            'message' => 'Incorrect email or password',
            'errors' => [
                'email' => 'Incorrect email or password'
            ]
        ], 401);
    }

    /**
     * Authenticates the user with a Google sub
     */
    public function google(Request $request)
    {
        $request->validate(['google_sub' => 'required|numeric|max_digits:25']);

        $user = User::where('google_sub', $request->google_sub)->first();
        if ($user != null) {
            return response()->json([
                'token' => $user->createToken($request->google_sub)->plainTextToken,
                'type' => $request->user()->branch->branchable_type,
                'admin' => $request->user()->isAdmin,
                'message' => 'Authenticated'
            ]);
        }

        return response()->json([
            'message' => 'Google account is not connected to any existing account',
        ], 401);
    }

    /**
     * Links a Google sub with the logged user
     */
    public function linkGoogle(Request $request)
    {
        $attributes =  $request->validate([
            'google_sub' => 'required|numeric|max_digits:25|unique:users'
        ]);

        $request->user()->update($attributes);

        return response()->json([
            'message' => 'Google account linked correctly'
        ]);
    }

    public function loginChecker()
    {
        return response()->json([
            'message' => 'Token not expired'
        ]);
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
