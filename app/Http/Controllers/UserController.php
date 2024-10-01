<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{


    public function indexPage()
    {
        if (auth()->check()) {
            if (auth()->user()->can('user')) {
                $users = User::all();
                return view('RolesPermission.User.index', compact('users'));
            } else {
                auth()->logout(); // Log out the user
                return redirect()->route('login')->with('error', 'You do not have permission to view and have been logged out.');
            }
        } else {
            return redirect()->back()->with('error', 'You need to login first.');
        }
    }

    public function getdata(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('role', function ($row) {
                    $roles = $row->getRoleNames(); // Get the roles of the user


                    if (!$roles->isEmpty()) {
                        foreach ($roles as $role) {
                            return   $role;
                        }
                    }
                })
                ->addColumn('action', function ($row) {
                    $deleteBtn='';
                    $editBtn='';


                    $editUrl = route('user.edit', $row->id);
                    $deleteUrl = route('user.distroy', $row->id);
                    $csrfToken = csrf_field();
                    $method = method_field('DELETE');
                    if (auth()->user()->can('user-edit')) {
                        $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-sm btn-success me-2 rounded" style="padding:8px;"><span>' .
                            '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">' .
                            '<g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z" fill="#ffffff"></path> </g></svg>' .
                            '</span></a>';
                    }

                    if (auth()->user()->can('user-delete')) {
                        $deleteBtn = '<form action="' . $deleteUrl . '" method="POST">
                    ' . $csrfToken . '
                    ' . $method . '
                    <button type="submit" class="delete btn btn-danger btn-sm" style="padding:8px;">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 20px; height: 20px;">
                                <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            </button>
                </form>';
                    }
                    return '<div class="d-flex align-items-center justify-content-center mb-2">'
                        . $editBtn . $deleteBtn .
                        '</div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        if (auth()->check()) {
            if (auth()->user()->can('user-create')) {
                $roles = Role::all();
                return view('RolesPermission.User.create', compact('roles'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required',
            'roles' => 'required',
            'image' => 'nullable|file|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'image/';
            $file->move(public_path($path), $filename);
            $imagePath = $filename;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' =>  $imagePath
        ]);
        // Sync roles by name
        $roleName = Role::findById($request->roles)->name;
        $user->syncRoles($roleName);
        return redirect()->route('user.index')->with('success', 'User added successfull');
    }


    public function edit($id)
    {

        if (auth()->check()) {
            if (auth()->user()->can('user-edit')) {
                $findData = User::find($id);
                $roles = Role::all();
                $userRoles = $findData->roles->pluck('name', 'name')->all();
                return view('RolesPermission.User.edit', compact('findData', 'roles', 'userRoles'));
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
        $find = User::find($id);
        $request->validate([
            'name' => 'nullable|string|max:255',
            'password' => 'nullable',
            'roles' => 'nullable',
            'image' => 'nullable|file|image|max:2048',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];
        if ($request->hasFile('image')) {

            $imagePath = public_path('image/' . $find->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'image/';
            $file->move(public_path($path), $filename);
            $data += [
                'image' => $filename,
            ];
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if (!empty($request->password)) {
            $data += [
                'password' => $request->password,
            ];
        }
        $find->update($data);
        $roleName = Role::findById($request->roles)->name;
        $find->syncRoles($roleName);
        return redirect()->route('user.index')->with('success', 'User Updated Successfully');
    }

    public function distroy($id)
    {
        if (auth()->check()) {
            if (auth()->user()->can('user-delete')) {
                $find = User::find($id);
                $imagePath = public_path('image/' . $find->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the image file
                }
                $find->delete();
                return  redirect()->route('user.index')->with('success', 'User Deleted Successfully');
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
