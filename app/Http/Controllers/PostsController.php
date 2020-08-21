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
        Post::create($this->validatePost());

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(Post $post)
    {
        $post->update($this->validatePost());

        return redirect($post->path());
    }

    protected function validatePost()
    {
        return request()->validate([
            "title" => "required",
            "description" => "required",
            "body" => "required"
        ]);
    }
}
