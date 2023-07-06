<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowSchoolResource;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    //

    public function getschool($id){
        $school = School::find($id);
        if($school!=''){
            $school = new ShowSchoolResource($school);
            return  response()->json(['success'=>true,'data'=>$school],200);
        }
        return response()->json(['success'=>true,'data'=>"No data !"],200);
    }


    public function getschools(){
        $school = School::all();
        return response()->json(['Get success'=>true, 'data'=>$school],200);
    }


}
