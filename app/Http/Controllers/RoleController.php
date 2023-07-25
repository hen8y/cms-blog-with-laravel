<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller

{
    //

    public function index(){
        $roles = Role::all();

        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function store(){
        request()->validate([
            'name'=>['required']
        ]);
        Role::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('_')
        ]);

        session()->flash('message', 'Post was Added');
        session()->flash('alert-class', 'alert-success');
        return back();
    }
    public function destroy(Role $role){


        $role->delete();
        
        session()->flash('message', 'Post was deleted');
        session()->flash('alert-class', 'alert-danger');

        return back();
    }
}
