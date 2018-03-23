<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Category;

class AdminCategoriesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $categories = Category::where('is_delete', 0)->get();
        return view('admin.categories.index', compact('categories'));
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

        $this->validate($request, [
            'name' => 'required|min:3',
            'parent_id' => 'required'
                ], [
            'name.required' => 'Name is required.',
            'name.min' => 'Name is very short.',
            'parent_id.required' => 'Please choose Category!!'
        ]);
//               
        $input = $request->all();
        $input['is_delete'] = 0;
        Category::create($input);
        return redirect()->back();
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
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $category = Category::findOrFail($id);
        $category->update($request->all());
//        return redirect('/admin/categories'); 
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Category::where('parent_id',$id)->delete();
        Category::findOrFail($id)->delete();
        \Illuminate\Support\Facades\Session::flash('deleted_category', 'The category has been deleted');
        return redirect('/admin/categories');
    }

}
