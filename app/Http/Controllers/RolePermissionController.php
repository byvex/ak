<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function index(Role $role)
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        
        return view('role-permissions.index', compact(
            'role',
            'permissions',
            'rolePermissions'
        ));
    }

    public function store(Request $request, Role $role)
    {
        $permissions = $request->input('permissions', []);
        
        $role->permissions()->sync($permissions);

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Permissions updated successfully');
    }
}