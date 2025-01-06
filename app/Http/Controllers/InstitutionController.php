<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutions = Institution::all(); // Corectarea numelui modelului
        return view('institutions.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('institutions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:institutions',
            'address' => 'nullable|string|max:255',
        ]);

        Institution::create($request->all()); // Corectarea numelui modelului

        return redirect()->route('institutions.index')->with('success', 'Instituția a fost creată cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Institution $institution)
    {
        return view('institutions.show', compact('institution'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institution $institution)
    {
        return view('institutions.edit', compact('institution'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Institution $institution)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:institutions,name,' . $institution->id,
            'address' => 'nullable|string|max:255',
        ]);

        $institution->update($request->all());

        return redirect()->route('institutions.index')->with('success', 'Instituția a fost actualizată cu succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        $institution->delete();

        return redirect()->route('institutions.index')->with('success', 'Instituția a fost ștearsă cu succes.');
    }
}
