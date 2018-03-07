<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(2); //phần phân trang back end trong lavavel
//        $users = DB::table('users')->get();
        return view('admin.users.index',  compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'username' => 'required',
           'email' => 'required |email',
           'password' => 'required',
           'phone'    => 'required|integer|min:10'
       ]);
       
       $input = $request->all();
       if(isset($request['is_active'])){
           $input['role']=1;
       } else {
            $input['role']=0;
       }
       $input['is_delete'] = 1;
       $input['indentifier'] = 1;
       $input['date_of_birth'] = $request['date'];
       $input['full_name'] = $request['username'];
       $input['password'] = bcrypt($request -> password);
       
       User::create($input);
       return redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return view('admin.users.edit',['users' => $user]);
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
        $user = User::findOrFail($id);
        if(trim($request->password) == '')
        {
            $input = $request->except('password');
        } else
        {
            $input = $request->all();
            $input['password'] = bcrypt($request -> password);
        }
        $user->update($input);
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        \Illuminate\Support\Facades\Session::flash('deleted_user','The user has been deleted');
        return redirect('/admin/user');
    }
}
