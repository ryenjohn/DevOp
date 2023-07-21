<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Http\Resources\SchoolResource;
use App\Http\Resources\ShowSkillResource;
use App\Http\Resources\SkillNameResource;
use App\Http\Resources\SkillResource;
use App\Http\Resources\SubjectResource;
use App\Models\School;
use App\Models\Skill;
use App\Models\Subject;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function getSkills()
    {
        $skills = Skill::all();
        $skills = ShowSkillResource::collection($skills);
        return response()->json(['success' => true, 'data' => $skills], 200);
    }

    public function getSkillById(string $id)
    {
        $skills = Skill::find($id);
        if (!$skills) {
            return response()->json(['message' => 'Skill id not found'], 404);
        }
        $skills = new ShowSkillResource($skills);
        return response()->json(['success' => true, 'data' => $skills], 200);
    }

    public function getSubjects()
    {
        $skills = Subject::all();
        $skills = SubjectResource::collection($skills);
        return response()->json(['success' => true, 'data' => $skills], 200);
    }

    public function createSkill(SkillRequest $request)
    {

        $skills = Skill::skill($request);
        $skills = new ShowSkillResource($skills);
        return response()->json(['message' => "Create skills success", 'data' => $skills], 201);
    }
    public function store(Request $request)
    {
        $book = Skill::store($request);
        return response()->json(['success' =>true, 'data' => $book],201);
    }

    public function editeSkill(SkillRequest $request, string $id)
    {
        $skill  = Skill::find($id);
        if ($skill) {
            $skill  = Skill::skill($request, $id);
            return response()->json(['Update skill  success' => true, 'data' => $skill], 200);
        }
        return response()->json(['message' => "Skill id not found"], 404);
    }

    public function deleteSkill(string $id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            return response()->json(['message' => 'Skill id not found'], 404);
        }
        $skill->delete();
        return response()->json(['Delete skill successfully' => true, 'data' => $skill], 201);
    }


}
