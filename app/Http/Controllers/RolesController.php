<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Permission;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $role = Roles::all();
        return view('roles.index', compact('role'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        Roles::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Rolul a fost creat cu succes.');
    }
    public function show($id)
    {
        $role = Roles::findOrFail($id); // Obțineți rolul dorit
        $name = $role->name; // Obțineți numele rolului

        return view('roles.show', compact('role', 'name')); // Trimit variabilele necesare la view
    }

//     public function edit($id)
// {

//     $roles = Roles::findOrFail($id); // Obțineți rolul dorit

//     return view('roles.edit', compact('roles', 'id')); // Trimit variabilele necesare la view
// }
public function edit($id)
{
    $role = Roles::with('permissions')->findOrFail($id);
    $permissions = Permission::all();

    // Extragem ID-urile permisiunilor deja atribuite rolului
    $rolePermissions = $role->permissions->pluck('id')->toArray();

    return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'permissions' => 'array|nullable',
    ]);

    $role = Roles::findOrFail($id);
    $role->name = $request->name;
    $role->save();

    // Actualizează permisiunile pentru rol
    if ($request->has('permissions')) {
        $role->permissions()->sync($request->permissions); // Sincronizează permisiunile
    } else {
        $role->permissions()->sync([]); // Dacă nu sunt bifate permisiuni, le ștergem pe toate
    }

    return redirect()->route('roles.index')->with('success', 'Rolul a fost actualizat cu succes.');
}


// public function updatePermissions(Request $request, $id)
// {
//     $role = Roles::findOrFail($id);

//     // Validăm permisiunile primite
//     $request->validate([
//         'permissions' => 'array', // Permisiunile trebuie să fie un array
//         'permissions.*' => 'exists:permissions,id', // Fiecare permisiune trebuie să existe în tabela 'permissions'
//     ]);

//     // Sincronizăm permisiunile selectate cu rolul
//     $role->permissions()->sync($request->permissions);

//     return redirect()->route('roles.index')->with('success', 'Permisiunile au fost actualizate cu succes.');
// }

public function destroy($id)
{


    $role = Roles::findOrFail($id);
    $role->permissions()->detach(); // Detachează permisiunile asociate
    $role->delete();

    return redirect()->route('roles.index')->with('success', 'Rolul a fost șters cu succes.');
}
}
