<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
  // Afișează toate diviziunile
  public function index()
  {
      $divisions = Division::all();
      return view('division.index', compact('divisions'));
  }

  // Formă pentru creare
  public function create()
  {
      return view('division.create');
  }

  // Salvează o diviziune nouă
  public function store(Request $request)
  {
      $request->validate([
          'name' => 'required|unique:divisions|max:255',
      ]);

      Division::create($request->all());

      return redirect()->route('divisions.index')->with('success', 'Diviziunea a fost creată cu succes.');
  }

  // Afișează detalii despre o diviziune
  public function show(Division $division)
  {
      return view('division.show', compact('division'));
  }

  // Formă pentru editare
  public function edit(Division $division)
  {
      return view('division.edit', compact('division'));
  }

  // Actualizează diviziunea
  public function update(Request $request, Division $division)
  {
      $request->validate([
          'name' => 'required|unique:divisions,name,' . $division->id . '|max:255',
      ]);

      $division->update($request->all());

      return redirect()->route('divisions.index')->with('success', 'Diviziunea a fost actualizată cu succes.');
  }

  // Șterge o diviziune
  public function destroy(Division $division)
  {
      $division->delete();

      return redirect()->route('divisions.index')->with('success', 'Diviziunea a fost ștearsă cu succes.');
  }
}
