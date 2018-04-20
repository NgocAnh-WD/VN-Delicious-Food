<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name'     => 'required|string|max:255',
                    'email'    => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                    'phone'    => 'string|min:10'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        if (!isset($data['is_active'])) {
            $data['is_active'] = 0;
        } else {
            $data['is_active'] = 1;
        }

        return User::create([
                    'username' => $data['name'],
                    'date_of_birth' => $data['date'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => bcrypt($data['password']),
                    'gender' => $data['gender'],
                    'avata_image' => 'avata_image',
                    'full_name' => $data['name'],
                    'address' => $data['address'],
                    'is_active' => '1',
                    'is_delete' => '1',
        ]);
        
        return redirect('/home');
    }
}
