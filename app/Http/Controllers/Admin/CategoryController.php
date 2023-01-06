<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent',0)->get();
        $AllCategories = Category::pluck('title','id')->all();
        return view('Admin.categories.CategoryTreeView', compact(['categories','AllCategories']));

    }

    public function manageCategory()
    {
        $categories = Category::where('parent',0)->get();
        $AllCategories = Category::pluck('title','id')->all();
        return view('Admin.categories.CategoryTreeView', compact(['categories','AllCategories']));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = Category::find(\request('parent'));
        return view('Admin.categories.CategoryTreeView', compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->parent)
        {
            $request->validate([
                'parent' => 'exists:categories,id'
            ]);
        }


            $request->validate([
            'title' => 'unique:categories',
            'description' => 'required',
        ]);



        Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'parent' => $request->parent ?? 0
        ]);

//        alert()->success('دسته بندی مورد نظر با موفقیت ایجاد شد','موفق آمیز')->persistent('متشکرم');

        return redirect(route('admin.categories.index'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $AllCategories = Category::pluck('title','id')->all();
        return view('Admin.categories.edit', compact('category' , 'AllCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        if ($request->parent)
        {
            $request->validate([
                'parent' => 'exists:categories,id'
            ]);
        }

        $request->validate([
            'title' => Rule::unique('categories')->ignore($category->id),
            'description' => 'required'
        ]);



        $category->update([
            'title' => $request->title,
            'description' => $request->description,
            'parent' => $request->parent ?? 0

        ]);

//        alert()->success('دسته بندی مورد نظر با موفقیت ویرایش شد','موفق آمیز')->persistent('متشکرم');

        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
