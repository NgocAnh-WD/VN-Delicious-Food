<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;

class AdminCommentsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $comments = Comment::where([['is_delete', '=', '0'], ['parent_id', '=', '0']])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->all();
        $user = Auth::user();
        if ($user) {
            $input['user_id'] = $user->id;
            $input['is_delete'] = 0;
            $comments = new Comment();
            Comment::create($input);
//            return redirect('product_details/'.$product_detail->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $comment = Comment::findOrFail($id);
        $comment['is_delete'] = 1;
        $comment->save();
        \Illuminate\Support\Facades\Session::flash('deleted_comment', 'The comment has been deleted');
        return redirect('/admin/comments');
    }

    public function getReplyComment($id) {
        $comments = Comment::where([['is_delete', '=', '0'], ['parent_id', '=', $id]])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

}
