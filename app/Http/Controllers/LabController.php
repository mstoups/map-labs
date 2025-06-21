<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Lab::query();
        
        if ($request->has('search') && $request->input('search') !== '') {
            $search = $request->input('search');
            // Assume searching by title
            $query->where('Title', 'like', "%{$search}%");
        }

        $labs = $query->get();
        
        return view('labs.index', compact('labs'));
    }

    public function store(Request $request)
    {
        Lab::create($request->validate([
            'Title' => 'required|string',
            'Description' => 'required|string',
            'Latitude' => 'required|numeric',
            'Longitude' => 'required|numeric',
        ]));
        return redirect()->route('labs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lab $lab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lab $lab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lab $lab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lab $lab)
    {
        //
    }

    public function search(Request $request)
    {
        $labs = Lab::where('name', 'LIKE', "%{$request->search}%")->get();
        return view('labs.index', compact('labs'));
    }
}
