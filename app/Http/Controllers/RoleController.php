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
        $Roles = Role::all();
        return view('RolesPermission.Role.index', compact('Roles'));
    }



    public function create()
    {
        $permissions = Permission::all();
     
        return view('RolesPermission.Role.create',compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions'
        ]);
        // $permission = Permission::create(['name' => 'edit articles']);
        Role::create([
            'name' => $request->name
        ]);
        return redirect()->route('role.index')->with('success','Role Created Successully');
    }


    public function edit($id)
    {
        $findData = Role::find($id);
        return view('RolesPermission.Role.edit', compact('findData'));
    }


   

    public function update(Request $request, $id)
    {
        $find = Role::find($id);
        $find->update($request->all());
        return redirect()->route('role.index')->with('success','Role Updated Successully');
    }

   


    public function distroy($id)
    {
        $find = Role::find($id);
        $find->delete();
        return redirect()->route('role.index')->with('success','Role Deleted Successully');
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
