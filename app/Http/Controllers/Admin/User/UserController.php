<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
//        $this->middleware('can:show-users')->only(['index']);
//        $this->middleware('can:create-user')->only(['create' , 'store']);
//        $this->middleware('can:edit-user')->only(['edit' , 'update']);
//        $this->middleware('can:delete-user')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query();

        if ($key =\request('table'))
        {
            $users->where('name','like',"%$key%")->orWhere('email','like',"%%$key")->orWhere('id' , $key);
        }

        if (\request('admin'))
        {
            $users->where('staff',1)->orWhere('super',1);
        }

        $users = $users->paginate(10);

        return view('Admin.users.all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.users.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create($data);

        if ($request->has('verify'))
        {
            $user->markEmailAsVerified();
        }

//        alert()->success('کاربر مورد نظر با موفقیت ایجاد شد','موفق آمیز')->persistent('متشکرم');

        return redirect(route('admin.users.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);
        if ($request->password){
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],

            ]);
            $data['password'] = $request->password;
        }

        $user->update($data);

        if ($request->has('verify'))
        {
            $user->markEmailAsVerified();
        }

//        alert()->success('کاربر مورد نظر با موفقیت ویرایش شد','موفق آمیز')->persistent('متشکرم');

        return redirect(route('admin.users.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
//        alert()->success('کاربر مورد نظر با موفقیت حذف شد','موفق آمیز')->persistent('متشکرم');
        return back();
    }
}
