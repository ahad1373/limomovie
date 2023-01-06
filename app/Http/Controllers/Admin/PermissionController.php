<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    public function __construct()
    {
//        $this->middleware('can:show-permissions')->only(['index']);
//        $this->middleware('can:create-permission')->only(['create' , 'store']);
//        $this->middleware('can:edit-permission')->only(['edit' , 'update']);
//        $this->middleware('can:delete-permission')->only(['destroy']);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::query();

        if ($key =\request('table'))
        {
            $permissions->where('title','like',"%$key%")->orWhere('description','like',"%%$key")->orWhere('id' , $key);
        }
        $permissions = $permissions->paginate(10);

        return view('Admin.permissions.all', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.permissions.create');
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
            'title' => ['required', 'string', 'max:255', 'unique:permissions'],
            'description' => ['required', 'string', 'max:255'],

        ]);

        $role = Permission::create($data);


//        alert()->success('دسترسی مورد نظر با موفقیت ایجاد شد','موفق آمیز')->persistent('متشکرم');

        return redirect(route('admin.permissions.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('Admin.permissions.edit', compact('permission'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('permissions')->ignore($permission->id)],
            'description' => ['required', 'string', 'max:255'],
        ]);


        $permission->update($data);



//        alert()->success('دسترسی مورد نظر با موفقیت ویرایش شد','موفق آمیز')->persistent('متشکرم');

        return redirect(route('admin.permissions.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
//        alert()->success('دسترسی مورد نظر با موفقیت حذف شد','موفق آمیز')->persistent('متشکرم');
        return back();
    }
}
