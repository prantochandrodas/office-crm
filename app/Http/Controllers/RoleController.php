<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->can('role')) {
                // Get all roles
                $roles = Role::all();

                // Initialize an array to hold roles with their permissions
                $rolesWithPermissions = [];

                foreach ($roles as $role) {
                    // Get permission IDs associated with the current role
                    $rolesPermissions = DB::table('role_has_permissions')
                        ->where('role_id', $role->id)
                        ->pluck('permission_id')
                        ->all();

                    // Get permission names for those IDs
                    $permissionNames = DB::table('permissions')
                        ->whereIn('id', $rolesPermissions)
                        ->pluck('name')
                        ->all();

                    // Store the role and its associated permission names
                    $rolesWithPermissions[] = [
                        'role' => $role,
                        'permissions' => $permissionNames,
                    ];
                }

                return view('RolesPermission.Role.index', compact('rolesWithPermissions'));
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to view and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }




    public function create()
    {
        if (auth()->check()) {
            if (auth()->user()->can('role-create')) {
                $permissions = Permission::all();
                return view('RolesPermission.Role.create', compact('permissions'));
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to create and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions',
            'permission' => 'nullable'
        ]);
        // $permission = Permission::create(['name' => 'edit articles']);
        $roleId = Role::create([
            'name' => $request->name
        ]);
        $findRole = Role::find($roleId->id);
        $findRole->syncPermissions($request->permission);
        return redirect()->route('role.index')->with('success', 'Role Created Successully');
    }

    public function edit($id)
    {
        if (auth()->check()) {
            if (auth()->user()->can('role-edit')) {
                $findData = Role::find($id);
                $permissions = Permission::all(); // Get all permissions
                $rolesPermissions = DB::table('role_has_permissions')
                    ->where('role_has_permissions.role_id', $id)
                    ->pluck('role_has_permissions.permission_id')
                    ->all(); // Pluck permission ids for the role
                $rolesPermissionsNames = Permission::whereIn('id', $rolesPermissions)
                    ->pluck('name') // Adjust this if your column is named differently
                    ->all();

                return view('RolesPermission.Role.edit', compact('findData', 'permissions', 'rolesPermissionsNames', 'rolesPermissions'));
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to edit and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }






    public function update(Request $request, $id)
    {
        $find = Role::find($id);
        $find->update($request->all());
        $find->syncPermissions($request->permission);
        return redirect()->route('role.index')->with('success', 'Role Updated Successully');
    }




    public function distroy($id)
    {
        if (auth()->check()) {
            if (auth()->user()->can('role-delete')) {
                $find = Role::find($id);
                $find->delete();
                return redirect()->route('role.index')->with('success', 'Role Deleted Successully');
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to delete and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }

    public function addPermissionToRole($id)
    {
        $findRoal = Role::find($id);
        $permissions = Permission::all();
        $rolesPermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('RolesPermission.Role.addPermission', compact('findRoal', 'permissions', 'rolesPermissions'));
    }





    public function givePermissionToRole(Request $request, $id)
    {
        // dd($request->permission);

        $request->validate([
            'permission' => 'nullable'
        ]);

        // dd($request->permission);
        $findRole = Role::find($id);
        // dd($findRole);
        $findRole->syncPermissions($request->permission);
        return response()->json([
            'success' => true,
            'message' => 'successfully added',
            'data' => $findRole
        ], 200);
    }
}
