<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAssignmentController extends Controller
{
    public function editUserRoles(User $user)
    {
        $roles = Role::all();
        return view('role-assignments.edit-user-roles', compact('user', 'roles'));
    }

    public function updateUserRoles(Request $request, User $user)
    {
        $user->syncRoles($request->roles);
        return redirect()->route('users.roles.edit', $user)->with('success', 'Roles updated successfully.');
    }

    public function editRolePermissions(Role $role)
    {
        $permissions = Permission::all();
        return view('role-assignments.edit-role-permissions', compact('role', 'permissions'));
    }

    public function updateRolePermissions(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.permissions.edit', $role)->with('success', 'Permissions updated successfully.');
    }
}

