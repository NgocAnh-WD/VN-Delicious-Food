<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }
    
     public function showLogin()
  {
      return view::make('login');  
  }
    
  // Process submission of the login form by verifying user’s credentials
  public function processLogin(Request $request )
  {
     echo var_dump($_POST);         
    $email = Input::get('email');
    $password = Input::get('password');
      $this->validate($request,[
//    			'username' => 'required|min:5|max:35',
    			'email' => 'required|email', //|unique:users
    			'password' => 'required|min:3|max:20',
//    			'confirm_password' => 'required|min:3|max:20|same:password',
    		],[
    			'email.required' => ' The email field is required.',
//    			'username.min' => ' The username must be at least 5 characters.',
//    			'username.max' => ' The username may not be greater than 35 characters.',
    			'password.required' => ' The password field is required.',
    			'password.min' => ' The password must be at least 5 characters.',
    			'password.max' => ' The password may not be greater than 35 characters.',
    		]);
      $email = $request->get('email');
      $password = $request->get('password');
      
    
    
  }
  
  
}
