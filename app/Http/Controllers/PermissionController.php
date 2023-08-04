<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index(){
        $permissions = Permission::all();

        return view('admin.permissions.index',['permissions'=>$permissions]);
    }

    public function store(){

        request()->validate([
            'name'=>'required'
        ]);
        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-')
        ]);
        session()->flash('message', 'New Permission was added');
        session()->flash('alert-class', 'alert-success');

        return back();


    }

    public function destroy(Permission $permissions){

        $permissions->delete();

        session()->flash('message', $permissions->name.' Permission was deleted');
        session()->flash('alert-class', 'alert-danger');

        return back();
    }

    public function edit(Permission $permissions){

        return view('admin.permissions.edit', ['permission'=>$permissions]);
    }
}
