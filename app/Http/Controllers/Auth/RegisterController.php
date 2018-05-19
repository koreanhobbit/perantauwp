<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
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
    protected function redirectTo() 
    {
        $user = Auth::user();
        
        //if role is customer
        if($user->hasRole('customer')) {
            return route('mainpage.index');
        }

        //if role is guide
        if($user->hasRole('guide')) {
            return route('manage.index');
        }

        //if role is provider
        if($user->hasRole('provider')) {
            return route('manage.index');
        }

        return route('mainpage.index');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'register-name' => 'required|string|max:255',
            'register-email' => 'required|string|email|max:255|unique:users,email',
            'registerpassword' => 'required|string|min:6|confirmed',
            'registerrole' => 'required|integer|between:5,7',
            'g-recaptcha-response' => 'required|captcha',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['register-name'],
            'email' => $data['register-email'],
            'password' => bcrypt($data['registerpassword']),
        ]);

        //add role 
        $role = Role::find($data['registerrole']);
        $user->attachRole($role);
        
        return $user;
    }
}
