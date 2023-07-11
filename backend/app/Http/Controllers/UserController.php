<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json(['success'=>true,'data'=>$user],200);

    }

    public function saveChange(Request $request,$id){
        $user = User::find($id);
        $user->update([
            'name' => request('name'),
            'email'=> request('email'),
            'password'=> request('password'),
            'role_id'=>request('role_id'),
            'address_id'=>request('address_id'),
        ]);

        return response()->json(['success'=>true, 'data'=>$user],200);
    }

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
