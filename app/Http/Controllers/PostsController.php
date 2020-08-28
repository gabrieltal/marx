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
            $posts = Post::latest()->get();
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
        $post->user_id = auth()->user()->id;
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

        return redirect($post->path())->with('message', 'Updated post!');
    }

    public function publish(Post $post)
    {
        $this->authorize('update', $post);
        $post->published_at = NOW();
        $post->save();
        return redirect($post->path())->with('message', 'Published post!');
    }

    public function give_comraderie(Post $post)
    {
        auth()->user()->giveComraderie($post);
        return back();
    }

    public function revoke_comraderie(Post $post)
    {
        auth()->user()->revokeComraderie($post);
        return back();
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
