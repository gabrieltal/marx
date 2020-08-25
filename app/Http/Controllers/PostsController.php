<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view("posts.show", ["post" => $post]);
    }

    public function index()
    {
        if (request('tag')) {
          $posts = Tag::where('name', request('tag'))->firstOrFail()->posts;
        } else {
          $posts = Post::all();
        }

        return view("posts.index", ["posts" => $posts]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view("posts.create", ['tags' => Tag::all()]);
    }

    public function store()
    {
        $this->authorize('create', Post::class);
        $this->validatePost();

        $post = new Post(request(['title', 'description', 'body']));
        $post->user_id = $user->id;
        $post->save();

        $post->tags()->attach(request('tags'));
        return redirect('/posts')->with('message', 'Published Post!');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', [
          'post' => $post,
          'tags' => Tag::all()
        ]);
    }


    public function update(Post $post)
    {
        $this->authorize('update', $post);

        $post->update($this->validatePost());

        return redirect($post->path())->with('message', 'Updated Post!');
    }

    protected function validatePost()
    {
        return request()->validate([
            "title" => "required",
            "description" => "required",
            "body" => "required",
            "tags" => "exists:tags,id"
        ]);
    }
}
