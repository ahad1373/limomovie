<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function __construct()
    {
//        $this->middleware('can:show-roles')->only(['index']);
//        $this->middleware('can:create-role')->only(['create' , 'store']);
//        $this->middleware('can:edit-role')->only(['edit' , 'update']);
//        $this->middleware('can:delete-role')->only(['destroy']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = Role::query();

        if ($key =\request('table'))
        {
            $roles->where('title','like',"%$key%")->orWhere('description','like',"%%$key")->orWhere('id' , $key);
        }
        $roles = $roles->paginate(10);
        return view('Admin.roles.all', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('Admin.roles.create', compact('permissions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:roles'],
            'description' => ['required', 'string', 'max:255'],
            'permissions' => ['array']

        ]);

        $role = Role::create($data);
        $role->permissions()->sync($data['permissions']);

//        alert()->success('گروه دسترسی مورد نظر با موفقیت ایجاد شد','موفق آمیز')->persistent('متشکرم');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('Admin.roles.edit', compact(['role','permissions']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($role->id)],
            'description' => ['required', 'string', 'max:255'],
            'permissions' => ['array']
        ]);

        $role->update($data);
        $role->permissions()->sync($data['permissions']);

//        alert()->success('گروه دسترسی مورد نظر با موفقیت ویرایش شد','موفق آمیز')->persistent('متشکرم');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
//        alert()->success('گروه دسترسی مورد نظر با موفقیت حذف شد','موفق آمیز')->persistent('متشکرم');
        return back();
    }
}
