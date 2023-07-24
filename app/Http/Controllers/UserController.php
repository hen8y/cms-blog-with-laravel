<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index (){

        $users = User::all();
        return view('admin.users.index',['users'=>$users]);

    }
    public function show (User $user){

        return view('admin.users.profile', ['user'=>$user]);

    }
    public function update (User $user){

        $validator = request()->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
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
}
