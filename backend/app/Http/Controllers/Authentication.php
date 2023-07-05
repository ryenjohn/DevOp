<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class Authentication extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            "name"=>$request["name"],
            "email"=>$request["email"],
            "password"=>bcrypt($request["password"])
          
        ]);

        $token = $user->createToken('API Token',['select', 'create', 'delete', 'update'])->plainTextToken;
        return response()->json([
            'message' => "Your account is created",
            'user' => $user,
            'token' => $token
        ],200);
    }
}
