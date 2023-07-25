<?php

namespace App\Http\Controllers;

use App\Models\TypeEducation;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class SchoolTypeController extends Controller
{
    //
    public function schoolType(){
        $types = TypeEducation::all();
        return response()->json(['success'=>true, 'data'=>$types],200);
    }
}
