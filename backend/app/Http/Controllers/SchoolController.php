<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowSchoolResource;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    
    public function search($name){
        $result = School::whereHas('address', function ($query) use ($name) {
            $query->where('city/province', 'like', "%$name%");
        })->get();
        if(count($result)){
            return $result;
        } else {
            return array('Result', 'No records found');
        }
    }
}


