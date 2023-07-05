<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowSchoolResource;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    //

    public function getschools(){
        $schools = School::all();
        $schools = ShowSchoolResource::collection($schools);
        return  response()->json(['success'=>true,'data'=>$schools],200);
    }
}
