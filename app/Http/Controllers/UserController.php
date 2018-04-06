<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Mail\NewUserWelcome;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserManualPassword;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(5);
        return view('admin.usermanagement.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('id', 'asc')->get();
        return view('admin.usermanagement.user.create', compact('roles'));
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'autogeneratepassword' => ['required'],
            'role' => ['required']
        ]);
        if($request->autogeneratepassword === 0) {
            $this->validate($request->password, [
                'password' => ['required', 'min:8'],
                'password_confirmation' => ['required_with:password', 'same:password']
            ]);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->autogeneratepassword === 1) {
            $random = uniqid();
            $user->password = Hash::make($random);
            $fp = $random;
        }
        else {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();
        if(!empty($request->role)) 
        {
            $user->roles()->attach($request->role, ['user_type' => 'App\User']);
        }

        if($request->autogeneratepassword === 1) {
            Mail::to($user->email)->queue(new NewUserWelcome($user, $fp));
        }

        else {
            Mail::to($user->email)->queue(new NewUserManualPassword($user));
        }
        $request->session()->flash('flashmessage', 'User ' . $user->name . ' is created!');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.usermanagement.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('id', 'asc')->get();
        return view('admin.usermanagement.user.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'current_password' => ['required', 'min:8'],
            'role' => ['required']
        ]);

        if($request->inputchangepassword === true) {
            $this->validate($request, [
                'password' => ['required', 'min:8'],
                'password_confirmation' => ['required_with:password', 'same:password']
            ]);
        }

        $user->roles()->detach();

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->inputchangepassword == true) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if(!empty($request->role)) 
        {
            $user->roles()->attach($request->role, ['user_type' => 'App\User']);
        }
        $request->session()->flash('flashmessage', 'User ' . $user->name . ' is updated!');
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('user.index')->with('flashmessage', 'User delete successfully!');
    }
}
