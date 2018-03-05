<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\File;

class AdminUsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        // $users = DB::table('users')->get();
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $input = $request->all();

        $input['password'] = bcrypt($request->password);

        if ($file = $request->file('photo_id')) {
            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $sub_folder = $year . '/' . $month . '/' . $day . '/';
            $upload_url = 'images/' . $sub_folder;

            if (!File::exists(public_path() . '/' . $upload_url)) {
                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
            }

            $name = time() . $file->getClientOriginalName();
            $file->move($upload_url, $name);
            $photo = Photo::create(['file' => $upload_url . $name]);
            $input['photo_id'] = $photo->id;
        }

        User::create($input);


        return redirect('/admin/users');
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
        $user = User::findOrFail($id);


        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $input = $request->all();
        $user = User::findOrFail($id);
        
        if ($user) {
            $input['user_id'] = $user->id;           

            if ($file = $request->file('photo_id')) {
                $year = date('Y');
                $month = date('m');
                $day = date('d');
                $sub_folder = $year . '/' . $month . '/' . $day . '/';
                $upload_url = 'images/' . $sub_folder;

                if (!File::exists(public_path() . '/' . $upload_url)) {
                    File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
                }

                $name = time() . $file->getClientOriginalName();
                $file->move($upload_url, $name);
                $photo = Photo::updated(['file' => $upload_url . $name]);
                $input['photo_id'] = $photo->id;
            }
            $user = User::findOrFail($id);

            $user->update($input);


            return redirect('/admin/users');
        } else {
            return view("errors.submit-error", ["data" => "Please login as administrator!"]);
        }
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::findOrFail($id);

        $user->delete();
        \Illuminate\Support\Facades\Session::flash('deleted_user', 'The user has been deleted');
        return redirect('/admin/users');
    }

}
