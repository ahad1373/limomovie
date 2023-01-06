<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::where('approve' ,1)->paginate(10);

//        $comments = $comments->;
        return view('Admin.comments.all', compact('comments'));
    }



    public function unapproved()
    {
        $comments = Comment::where('approve' ,0)->get();

        return view('Admin.comments.unapproved', compact('comments'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {

        $comment->update([
            $comment->approve = 1
        ]);

//        alert()->success('نظر با موفقیت تایید شد.','موفق آمیز')->persistent('متشکرم');
        return redirect(route('admin.comments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
//        alert()->success('نظر با موفقیت حذف شد.','موفق آمیز')->persistent('متشکرم');
        return back();

    }
}
