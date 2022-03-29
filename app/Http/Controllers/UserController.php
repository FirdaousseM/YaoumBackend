<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function register(Request $requete)
    {

        $requete->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
            'avatar' => ['string']
        ]);

        $user = User::create([
            'name' => $requete['name'],
            'email' => $requete['email'],
            'password' => bcrypt($requete['password']),
            'avatar' => $requete['avatar']
        ]);

        $token = $user->createToken('yaoumtoken')->plainTextToken;

        $session_user = [
            'user' => $user,
            'token' => $token
        ];

        return response($session_user);
    }

    public function login(Request $requete)
    {
        $fields = $requete->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Mot de passe erroné'
            ], 401);
        }

        $token = $user->createToken('yaoumtoken')->plainTextToken;

        $session_user = [
            'user' => $user,
            'token' => $token
        ];

        return response($session_user, 201);
    }

    public function logout(Request $requete)
    {
        $requete->user()->currentAccessToken()->delete();

        return [
            'message' => 'Deconnecté'
        ];
    }

    
    public function getAccount(Request $requete)
    {


    }
}
