<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
   

    public function indexPage()
    {
        $users = User::all();
        return view('RolesPermission.User.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('RolesPermission.User.create', compact('roles'));
    }


   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:20',
            'roles' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);
        return response()->json([
            'success' => true,
            'message' => 'user added successfull',
            'data' => $user
        ]);
    }


    public function edit($id)
    {
        $findData = User::find($id);
        $roles = Role::all();
        $userRoles = $findData->roles->pluck('name', 'name')->all();
        return view('RolesPermission.User.edit',compact('findData','roles','userRoles'));
    }

    public function update(Request $request, $id)
    {
        $find = User::find($id);
        $request->validate([
            'name' => 'nullable|string|max:255',
            'password' => 'nullable',
            'roles' => 'nullable'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (!empty($request->password)) {
            $data += [
                'password' => $request->password,
            ];
        }
        $find->update($data);
        $find->syncRoles($request->roles);
        return redirect()->route('user.index')->with('success','User Updated Successfully');
    }

    public function distroy($id)
    {
       
        $find = User::find($id);
        $find->delete();
        redirect()->route('user.index')->with('success','User Deleted Successfully');
    }
   

    public function addPermissionToRole($id)
    {
        $findRoal = Role::find($id);
        // $permissions=Permission::all();
        $rolesPermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('RolesPermission.Role.addPermission', compact('findRoal', 'permissions', 'rolesPermissions'));
    }


    public function givePermissionToRole(Request $request, $id)
    {


        $request->validate([
            'permission' => 'required'
        ]);
        // dd($request->permission);
        $findRole = Role::find($id);
        $findRole->syncPermissions($request->permission);
        return redirect()->route('role.index')->with('success', 'successfully added');
    }
}
