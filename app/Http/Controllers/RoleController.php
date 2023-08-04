<?php

namespace App\Http\Controllers;
use App\Models\Permission;
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

    public function edit(Role $role){
        $permits = Permission::all();
        return view('admin.roles.edit', ['role'=>$role, 'permissions'=> $permits]);
    }

    public function update(Role $role){
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')))->slug('_');
        if($role->isClean('name')){
            $role->save();
            session()->flash('message', 'Nothing was updated');
        }else{
            $role->save();
            session()->flash('message', 'Role was updated');
        }
        return back();
    }

    public function attach_permission(Role $role){
        $role->permissions()->attach(request('permission'));

        return back();

    }

    public function detach_permission(Role $role){
        $role->permissions()->detach(request('permission'));

        return back();

    }
}
