<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostsController extends Controller
{
    public function show($id)
    {
        return view("posts.show", [
            "post" => Post::find($id)
        ]);
    }

    public function index()
    {
        return view("posts.index", [
            "posts" => Post::all()
        ]);
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store()
    {
        $post = new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->description = request('description');
        $post->save();

        return redirect('/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }


    public function update($id)
    {
        $post = Post::find($id);
        $post->title = request('title');
        $post->body = request('body');
        $post->description = request('description');
        $post->save();
        return redirect('/posts/' . $post->id);
    }
}
