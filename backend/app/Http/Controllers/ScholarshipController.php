<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScholarshipResource;
use App\Http\Resources\ShowScholarshipResource;
use App\Models\ScholarShip;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function scholarships()
    {
        $scholarship = ScholarShip::all();
        if($scholarship!=''){
            $scholarship = ShowScholarshipResource::collection($scholarship);
            return  response()->json(['success'=>true,'data'=>$scholarship],200);
        }
        return response()->json(['success'=>true,'data'=>"No data !"],500);
        
    }
    public function getScholarship(string $id)
    {
        {
            $scholarship = ScholarShip::find($id);
            if($scholarship!=''){
                $scholarship = new ScholarshipResource($scholarship);
                return  response()->json(['success'=>true,'data'=>$scholarship],200);
            }
            return response()->json(['success'=>true,'data'=>"Sorry your data doesn't have yet!","status"=>500],500);
            
        }
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}