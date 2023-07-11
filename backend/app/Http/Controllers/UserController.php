<?php

namespace App\Http\Controllers;

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

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['success' => true, 'message' => `user id:{$id} has been deleted`], 200);
    }

}
