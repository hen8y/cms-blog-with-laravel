<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    //
    public function show(Post $post){

        return view('blog-post', ['post'=>$post]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(Request $request){
        $input = request()->validate([
            'title'=>'required|min:8|max:255',
             'post_image'=>'file',
             'body'=>'required'
        ]);

        if(request('post_image')){
            $input['post_image'] = request('post_image')->store('images');
        }

       $auth = auth()->user()->posts();

        return dd($auth);


    }
}
