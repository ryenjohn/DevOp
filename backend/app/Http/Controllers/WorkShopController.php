<?php

namespace App\Http\Controllers;

use App\Models\WorkShop;
use Illuminate\Http\Request;

class WorkShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function workshops()
    {
        $workshop = WorkShop::all();
        return response()->json(['Get success'=>true, 'data'=>$workshop],200);
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
