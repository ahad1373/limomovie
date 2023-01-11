<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::query();
        $plans = $plans->paginate(5);
        return view('Admin.plans.all' , compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.plans.create');
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
            'title' => ['required' , 'unique:plans'],
            'time_month' => 'required',
            'price' => 'required'
        ]);

        if ($request->status == "on")
        {
            $data['status'] = 1;
        }else
        {
            $data['status'] = 0;dd($data['status']);
        }

        Plan::create($data);
        return redirect(route('admin.plans.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plans = Plan::query();
        $plan = $plans->where('id' , $id)->first();
        return view('Admin.plans.edit' , compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $plans = Plan::query();
        $plan = $plans->where('id' , $id)->first();
        $data = $request->validate([
            'title' =>['required' ,  Rule::unique('plans')->ignore($plan->id)]  ,
            'time_month' => 'required',
            'price' => 'required'
        ]);
        if ($request->status == "on")
        {
            $data['status'] = 1;
        }else
        {
            $data['status'] = 0;
        }
        $plan->update($data);

        return redirect(route('admin.plans.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plans = Plan::query();
        $plan = $plans->where('id' , $id)->first();
        $plan->delete();
        return back();
    }
}
