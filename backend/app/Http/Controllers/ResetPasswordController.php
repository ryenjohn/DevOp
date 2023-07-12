<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first(); 
        
        $request->validate([
            'password'=> 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
        ]);

        $password = $request->password;

        $user->update([
            'password' =>  bcrypt($password),
        ]);
        if ($user->save()) {
            return response()->json([
                'message' => 'Password changed successfully',
                'status_code' => 200,
                "data" => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'Some error occurred, Please try again',
                'status_code' => 500
            ], 500);
        }
        
    }
}
