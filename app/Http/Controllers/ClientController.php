<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Image;

class ClientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = User::orderBy('id');
        return view('/profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
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

    protected function validator(array $data) {
        return Validator::make($data, [
                    'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::findOrFail($id);
        $u = User::pluck('gender', 'id')->all();

        $images = User::pluck('avata_image')->all();
        return view('clients.user.profile', ['users' => $user], ['u' => $u], ['images' => $images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $input = $request->all();
        $user_id = $id;
        $input['date_of_birth'] = $request['date'];
//
//        $user->validate($request, [
//        'old_password'          => 'required',
//        'password'              => 'required|min:4',
//        'password_confirmation' => 'required|confirmed'
//    ]);
//
//        $user->password = Hash::make(Input::get('new-password'));
//        $user->save();

        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        
        

        if (isset($request['is_active'])) {
            $input['is_active'] = 1;
        } else {
            $input['is_active'] = 0;
        }
        $input['username'] = $request['name'];
//        $input['avata_image'] = $request['avata_image'];
        $input['date_of_birth'] = $request['date'];
        $input['gender'] = $request['gender'];

        $file = $request->file('avata_image');

        if ($file) {
            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $sub_folder = $year . '/' . $month . '/' . $day . '/';
            $upload_url = 'images/' . $sub_folder;

//             var_dump($upload_url);

            if (!File::exists(public_path() . '/' . $upload_url)) {
                File::makeDirectory(public_path() . '/' . $upload_url, 0777, true);
            }
            //
            $name = time() . $file->getClientOriginalName();

            $file->move($upload_url, $name);
            $input['avata_image'] = $upload_url . $name;
        }

        $user->update($input);
        \Illuminate\Support\Facades\Session::flash('update_profile', 'Your profile has been updated');
        return redirect('/profile');
    }

    public function destroy($id) {
        
    }
}
