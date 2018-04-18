<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Image;

class AdminUserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::orderBy('id', 'asc')->paginate(5); //phần phân trang back end trong lavavel
//        $users = DB::table('users')->get();
        $images = Image::all();
        return view('admin.users.index', compact('users', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
//        \Illuminate\Support\Facades\Session::flash('create_user','The user has been create!!!');
        return view('admin.users.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'phone' => 'required|integer|min:10'
        ]);

        $user_id = DB::getPdo()->lastInsertId();

        //$input = $request->all();
        if (isset($request['is_active'])) {
            $input['is_active'] = 1;
        } else {
            $input['is_active'] = 0;
        }
        $input['username'] = $request['username'];
        $input['is_delete'] = 1;
        $input['date_of_birth'] = $request['date'];
        $input['full_name'] = $request['username'];
        $input['address'] = $request['address'];
        $input['gender'] = $request['gender'];
        $input['phone'] = $request['phone'];
        $input['email'] = $request['email'];
        
        $input['password'] = bcrypt($request->password);

//       $input = $request->all();
//       $user = Auth::user();
//        if ($user) {
//            $input['user_id'] = $user->id;
//            if ($file = $request->file('avatar_image')) {
        $file = $request->file('avatar_image');
       
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
            $input['avata_image'] = $upload_url. $name;
//            $input['avata_image'] = $request['avatar_image'];
//            var_dump($input['avata_image']) ;
           // $input['avata_image'] = $images->id;
            
        }


//            }
            User::create($input);
         return redirect('/admin/users');
//        } else {
//            return view("errors.submit-error", ["data" => "Please login as administrator!"]);
//        }
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
        $u = User::pluck('gender', 'id')->all();
        $gender = User::where('id',$id)->first();
        $images = User::pluck('avata_image')->all();
        return view('admin.users.edit', ['users' => $user],['gender' => $gender], ['u' => $u], ['images' => $images]);
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
            $input['avata_image'] = $upload_url. $name;
        }

        $user->update($input);
        \Illuminate\Support\Facades\Session::flash('update_user', 'The user has been updated');
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
