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
    public function getmajors()
    {
            $skills = Skill::all();
            $skills = SkillResource::collection($skills);
            return response()->json(['success'=>true,'data'=>$skills],200);
    



    }
   
}
