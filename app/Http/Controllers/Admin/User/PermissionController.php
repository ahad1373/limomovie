<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request , User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('Admin.users.permission', compact(['roles' , 'permissions' , 'user']));
    }

    public function insert(Request $request , User $user)
    {

        $user->roles()->sync($request['roles']);
        $user->permissions()->sync($request['permissions']);

//        alert()->success('دسترسی های مورد نظر برای کاربر اعمال شدند.' , 'موفق آمیز')->persistent('متشکرم');
        return redirect(route('admin.users.index'));
    }
}
