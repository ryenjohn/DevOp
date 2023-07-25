<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScholarshipResource;
use App\Http\Resources\ShowScholarshipResource;
use App\Models\ScholarShip;
use Illuminate\Http\Request;

use function GuzzleHttp\describe_type;

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
        return response()->json(['success'=>true,'data'=>"No data !"],200);
        
    }
   
    public function scholarship(string $id)
    {
        {
            $scholarship = ScholarShip::find($id);
            if($scholarship!=''){
                $scholarship = new ScholarshipResource($scholarship);
                return  response()->json(['message'=>'Request success','data'=>$scholarship],200);
            }
            return response()->json(["message"=>"No data !"],200);
            
        }
    
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $scholarShip = ScholarShip::store($request);
        if($scholarShip){
            return response()->json(['scholarship have been created' => true, 'data' => $scholarShip], 200);
        }
        return response()->json(['message' => "scholarship cannot create"], 200);
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
        $scholarsip = ScholarShip::find($id);
        if($scholarsip){
            $scholarsip->delete();
            return  response()->json(["message"=>"Deleted!"],200);
        }
        return response()->json(["message"=>"No data !"],200);
    }
}
