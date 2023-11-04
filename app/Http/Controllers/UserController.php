<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:users.create')->only(['create', 'store']);
        $this->middleware('can:users.index')->only(['index']);
        $this->middleware('can:users.edit')->only(['edit', 'update']);
        $this->middleware('can:users.show')->only(['show']);
        $this->middleware('can:users.destroy')->only(['destroy']);
    }

    public function index()
    {
        $user_session = Auth::user()->email;
        $users = User::get();
        return view('admin.user.index', compact('users', 'user_session'));
    }

    public function create()
    {
        $user_session = Auth::user()->email;
        $roles = Role::get();
        return view('admin.user.create', compact('roles', 'user_session'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->update(['password' => Hash::make($request->password)]);
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        $user_session = Auth::user()->email;
        return view('admin.user.show', compact('user', 'user_session'));
    }

    public function edit(User $user)
    {
        $user_session = Auth::user()->email;
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'roles', 'user_session'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->id > 1) {
            $user->update($request->all());
            $user->roles()->sync($request->get('roles'));
        }
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        try {
            if ($user->id > 1) {
                $user->delete();
            }
        } catch (\Exception $e) {
            $errors = 'Registro relacionado, imposible de eliminar';
        }
        return redirect()->route('users.index');
    }
    
}