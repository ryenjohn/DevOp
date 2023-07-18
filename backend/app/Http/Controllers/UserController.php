<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\Register;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
    {
        $users = User::all();
        return response()->json(['message' => "Your get data use is success", 'data' => $users], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            return response()->json(['exists' => false, 'message' => 'Email already exists'], 400);
        }
       
        $user = User::store($request);
        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json(['exists' => true, 'message' => "Your account is created", 'data' => $user, 'token' => $token], 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }




    
    /**
     * Update the specified resource in storage.
     */


    public function sendEmail(Request $request)
    {

       
        $data =[
            'subject' =>"Reset password",
            'email'=>$request->email,
            'link'=>'http://localhost:8080/signUp'

        ];
        try
        {
            Mail::to($data['email'])->send(new Register($data));
            return response()->json("great check you mail box");
        }
        catch(Exception $th)
        {
            return response()->json("Sorry something went wrong");

        }

    }
  
    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(string $id)
    {
        //
    }
}
