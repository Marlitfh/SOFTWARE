<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:roles.create')->only(['create', 'store']);
        $this->middleware('can:roles.index')->only(['index']);
        $this->middleware('can:roles.edit')->only(['edit', 'update']);
        $this->middleware('can:roles.show')->only(['show']);
        $this->middleware('can:roles.destroy')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::get();
        $user_session = Auth::user()->email;
        return view('admin.role.index', compact('roles', 'user_session'));
    }

    public function create()
    {
        $user_session = Auth::user()->email;
        $permissions = Permission::get();
        return view('admin.role.create', compact('permissions', 'user_session'));
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        $user_session = Auth::user()->email;
        return view('admin.role.show', compact('role', 'user_session'));
    }

    public function edit(Role $role)
    {
        $user_session = Auth::user()->email;
        $permissions = Permission::get();
        return view('admin.role.edit', compact('role', 'permissions', 'user_session'));
    }

    public function update(Request $request, Role $role)
    {
        if ($role->id > 1) {
            $role->update($request->all());
            $role->permissions()->sync($request->get('permissions'));
        }
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        try {
            if ($role->id > 1) {
                $role->delete();
            }
        } catch (\Exception $e) {
            $errors = 'Registro relacionado, imposible de eliminar';
        }

        return back();
    }
}
