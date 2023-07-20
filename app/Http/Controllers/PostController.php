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
        $posts = Post::all();
        return view('admin.posts.index', ['posts'=>$posts]);
    }
    public function edit(Post $post){

        $this->authorize('view', $post);
        return view('admin.posts.edit', ['post'=>$post]);
    }

    public function destroy(Post $post){
        $post->delete();

        session()->flash('message', 'Post was deleted');
        session()->flash('alert-class', 'alert-danger');

        $this -> authorize('delete',$post);
        return back();

    }

    public function update(Post $post){
        $validator = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image'=> 'file',
            'body' => 'required'
        ]);

        if(request('post_image')){
            $validator['post_image'] = request('post_image')->store('images');
            $post->post_image = $validator['post_image'];
        }
        $post->title = $validator['title'];
        $post->body = $validator['body'];

        auth()->user()->posts()->save($post);
        session()->flash('message', 'Post Has been Updated');
        session()->flash('alert-class', 'alert-success');

        $this -> authorize('update',$post);


        return redirect(route('post.index'));
    }
}

