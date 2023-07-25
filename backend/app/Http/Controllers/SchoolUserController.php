<?php

namespace App\Http\Controllers;

use App\Http\Resources\SchoolResource;
use App\Http\Resources\SchoolUserResource;
use App\Http\Resources\UserResource;
use App\Models\SchoolUser;
use Illuminate\Http\Request;

class SchoolUserController extends Controller
{
    



    public function getSchoolUser(Request $request){
        $schoolUsers = SchoolUser::where('accept', false)->get();
        $schoolUsers = SchoolUserResource::collection($schoolUsers);
        return response()->json(['success'=>"request successfully", 'data'=>$schoolUsers],200);
    }

    public function studentAccept(Request $request,$id){
        $student = SchoolUser::find($id);
        $student->update(['accept' => true]);
        return response()->json(['success'=>"request successfully", 'data'=>$student],200);
    }
    public function studentReject($id){
        $student = SchoolUser::find($id);
        $student->delete();
    return response()->json(['success' => 'Record deleted successfully'], 200);
    }
}
