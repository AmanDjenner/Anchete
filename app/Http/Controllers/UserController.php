<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Institution;
use App\Models\Division;
use App\Models\Roles;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['institution', 'division', 'role'])->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $institutions = Institution::all(); // Obține toate instituțiile
        $divisions = Division::all(); // Obține toate diviziile
        $roles = Roles::all(); // Obține toate rolurile
        $divisions = Division::all(); // Sau Division::pluck('name', 'id') pentru un array simplu
        $permissions = Permission::all(); // Pentru permisiuni
        $institutions = Institution::all(); // Adaugă această linie pentru a obține instituțiile
        return view('users.create', compact('divisions', 'roles', 'permissions', 'institutions'));

     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'institution_id' => 'required|exists:institutions,id',
            'division_id' => 'required|exists:divisions,id', // Adaugă validare pentru division_id
            'role_id' => 'nullable|exists:roles,id',
            'new_role' => 'nullable|string|max:255|unique:roles,name', // Validare pentru rolul nou
        ]);

        // Verificăm dacă s-a introdus un rol nou
        if ($request->filled('new_role')) {
            $role = Roles::create([
                'name' => $request->new_role,
            ]);

            $request->merge(['role_id' => $role->id]); // Asociem noul rol la utilizator

        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'institution_id' => $request->institution_id,
            'division_id' => $request->division_id, // Asigură-te că e furnizat
            'role_id' => $request->role_id,
        ]);

        if ($request->has('permissions')) {
            $user->permissions()->sync($request->permissions);
        }
        return redirect()->route('users.index')->with('success', 'Utilizatorul a fost creat cu succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $user = User::with(['role.permissions', 'institution', 'division'])->findOrFail($id);
    // dd($user->role); // Verifică permisiunile
    return view('users.show', compact('user'));
}

    // public function show(User $user)
    // {
    //     return view('users.show', compact('user'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $institutions = Institution::all();
        $divisions = Division::all();
        $roles = Roles::all();

        return view('users.edit', compact('user', 'institutions', 'divisions', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'institution_id' => 'nullable|exists:institutions,id',
            'division_id' => 'nullable|exists:divisions,id',
            'role_id' => 'nullable|exists:roles,id',
        ]);

        $data = $request->only(['name', 'email', 'institution_id', 'division_id', 'role_id']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Utilizatorul a fost actualizat cu succes.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilizatorul a fost șters cu succes.');

    }
}
