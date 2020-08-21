<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view("posts.show", ["post" => $post]);
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
        request()->validate([
          "title" => ['required', 'min:3', 'max:255'],
          "description" => ["required"],
          "body" => ["required"]
        ]);

        $post = new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->description = request('description');
        $post->save();

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(Post $post)
    {
        request()->validate([
          "title" => ['required', 'min:3', 'max:255'],
          "description" => ["required"],
          "body" => ["required"]
        ]);

        $post->title = request('title');
        $post->body = request('body');
        $post->description = request('description');
        $post->save();
        return redirect('/posts/' . $post->id);
    }
}
