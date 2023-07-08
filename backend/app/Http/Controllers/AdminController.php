<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return response()->json(['message' => "Your get user is success", 'data' => $users], 200);

    }



    public function getStudents()
    {
        //
        $role = Role::where('name', 'student')->first();
        $students = User::where('role_id', $role->id)->get();
    
        return response()->json(['message' => "Your get data request is successful", 'data' => $students], 200);
    }

    public function getUniversityDirectors()
    {
        $role = Role::where('name', 'university_manager')->first();
        $universityDirectors = User::where('role_id', $role->id)->get();

        return response()->json(['message' => "Your get data request is successful", 'data' => $universityDirectors], 200);
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
