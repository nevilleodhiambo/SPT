<?php

namespace App\Http\Controllers;

use App\Models\StakeHolder;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class StakeHolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stakeholders = StakeHolder::all();
        return view('stakeholder.index', compact('stakeholders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('stakeholder.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stakeholder = new StakeHolder();
        $stakeholder->name = $request->name;
        $stakeholder->email = $request->email;
        $stakeholder->number = $request->number;
        $stakeholder->role_id = $request->role_id;
        $stakeholder->save();
        return redirect()->route('stakeholder.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(StakeHolder $stakeHolder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StakeHolder $stakeHolder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StakeHolder $stakeHolder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StakeHolder $stakeHolder)
    {
        
    }
}
