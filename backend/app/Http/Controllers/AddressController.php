<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function addresses(){
        $addresses = Address::all();
        return response()->json(['message' => "Your get user is success", 'data' => $addresses], 200);
    }
}
