<?php

namespace App\Http\Controllers;

use App\Http\Resources\SchoolResource;
use App\Http\Resources\SkillResource;
use App\Models\School;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    //
    public function MajorDetail($id)
    {
        $subject=Skill::find($id);
        if($subject!=''){

            $subject = new SkillResource($subject);
    
            return response()->json(['success'=>true,'data'=>$subject],200);
        }
        return response()->json(['message'=>"No data"],200);
    



    }
    // public function getskill()
    // {
    //     $school=School::all();
    //     // $school = new SchoolResource($school);

    //     return response()->json(['success'=>true,'data'=>$school],200);


    // }
}
