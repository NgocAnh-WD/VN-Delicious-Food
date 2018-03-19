<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Post;
use App\User;
use App\Comment;

class AdminCommentController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(2);
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
            $input['author'] = $user->name;
            $input['photo_id'] = 1;
            $input['parent_id'] = 1;
            $input['email'] = $user->email;
            $comments = new Comment();
            Comment::create($input);
            return redirect('post/' . $input['post_id']);
        }
    }

    public function search() {
        $posts = Post::search($_GET['search'])->paginate(3);
        $posts->setPath('search?search=' . $_GET['search']);
        $search = $_GET['search'];
        $is_search = 1;
//        $categories = Category::all();

        return view('home', compact('posts', 'is_search', 'search'));
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
//
    }

}
