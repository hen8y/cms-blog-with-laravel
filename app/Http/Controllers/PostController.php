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

       auth()->user()->posts()->create($input);

        session()->flash('message', 'New Post Added');
        session()->flash('alert-class', 'alert-success');

        return redirect(route('post.index'));


    }

    public function index(){
        $outputs = Post::all();

        return view('admin.posts.index', ['outputs'=>$outputs]);
    }
    public function edit(Post $post){

        return view('admin.posts.edit', ['post'=>$post]);
    }

    public function update(Post $post){
        $input = request()->validate([
            'title'=> 'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $input['post_image']->request('post_image')->store('images');
            $post->post_image =  $input['post_image'];
        }
        $post->title =  $input['title'];
        $post -> body =  $input['body'];


        auth()->user()->save($post);

    }
    public function destroy(Post $post){

        $post->delete();

        session()->flash('message', 'Post was deleted');
        session()->flash('alert-class', 'alert-danger');

        return back();
    }
}
