<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('name', '!=', 'Admin')->with('roles')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // public function create()
    // {
    //     $roles = Role::all();
    //     return view('admin.users.create', compact('roles'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:8|confirmed',
    //         'role' => 'required|exists:roles,id'
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password)
    //     ]);

    //     $user->syncRoles([$request->role]);

    //     return redirect()->route('admin.users.index')
    //         ->with('success', 'User created successfully');
    // }

    public function create()
{
    $roles = Role::where('name', '!=', 'admin')->get();
    return view('admin.users.create', compact('roles'));
}

public function edit(User $user)
{
    $roles = Role::where('name', '!=', 'admin')->get();
    return view('admin.users.edit', compact('user', 'roles'));
}

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        'role' => 'required|exists:roles,id' // Still validate ID exists
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);

    // Get role by ID and assign by name
    $role = Role::findById($request->role);
    $user->syncRoles([$role->name]);

    return redirect()->route('admin.users.index')
        ->with('success', 'User created successfully');
}

public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'password' => 'nullable|min:8|confirmed',
        'role' => 'required|exists:roles,id' // Still validate ID exists
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email
    ];

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data);

    // Get role by ID and assign by name
    $role = Role::findById($request->role);
    $user->syncRoles([$role->name]);

    return redirect()->route('admin.users.index')
        ->with('success', 'User updated successfully');
}

    // public function edit(User $user)
    // {
    //     $roles = Role::all();
    //     return view('admin.users.edit', compact('user', 'roles'));
    // }

    // public function update(Request $request, User $user)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,'.$user->id,
    //         'password' => 'nullable|min:8|confirmed',
    //         'role' => 'required|exists:roles,id'
    //     ]);

    //     $data = [
    //         'name' => $request->name,
    //         'email' => $request->email
    //     ];

    //     if ($request->filled('password')) {
    //         $data['password'] = bcrypt($request->password);
    //     }

    //     $user->update($data);
    //     $user->syncRoles([$request->role]);

    //     return redirect()->route('admin.users.index')
    //         ->with('success', 'User updated successfully');
    // }

    public function destroy(User $user)
    {
        // Prevent self-deletion
        if ($user->id === auth()->id()) {
            return redirect()->back()
                ->with('error', 'You cannot delete your own account');
        }

        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }
}