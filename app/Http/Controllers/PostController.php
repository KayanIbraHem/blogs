<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    public function index()
    {
        $posts=Post::all();
        
        return view('posts.index',[
            'posts'=>$posts
        ]);
    }

    public function create()
    {
        return view('posts.create',[
            'users'=>User::all()
        ]);
    }
    public function show($post)
    {
        $post=Post::find($post);
        return view('posts.show',[
            'post'=>$post
        ]);
    }
    public function store(PostRequest $request)
    { 
        $post=new Post();
        $post->title=$request->title;  
        $post->description=$request->description; 
        $post->user_id=$request->user_id;
        $post->save();
        return redirect()->route('posts.index');
    }
    public function edit(Post $post)
    {
        return view('posts.edit',['post'=>$post]);
    }
    public function update(Post $post, PostRequest $request)
    {
        $post->title=$request->title;
        $post->description=$request->description; 
        $post->save();
        
        return redirect()->route('posts.index');
    }
    public function destroy(Post $post)
    {
    $post->delete();
    return redirect()->route('posts.index');    
    }
}
