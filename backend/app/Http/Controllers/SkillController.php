<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    //
    public function MajorDetail($id)
    {
        $subject=Skill::find($id);
        $subject = new SkillResource($subject);

        return response()->json(['success'=>true,'data'=>$subject],200);


    }
}
