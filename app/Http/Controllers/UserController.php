<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index (){

        $users = User::all();
        return view('admin.users.index',['users'=>$users]);

    }
    public function show (User $user){

        $roles = Role::all();

        return view('admin.users.profile', ['user'=>$user, 'roles'=>$roles]);

    }
    public function update (User $user){

        $validator = request()->validate([
            'username' => [ 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'avatar'=>['file'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if( request('avatar')){
            $validator['avatar']= request('avatar')->store('images');
        }
        $user->update($validator);

        return back();

    }

    public function destroy(User $user){

        $user->delete();
        session()->flash('message', 'User Delete Successful');
        return back();
    }

    public function attach(User $user){
        $user ->roles()->attach(request('role'));

        return back();
    }

    public function detach(User $user){
        $user ->roles()->detach(request('role'));

        return back();
    }
}
