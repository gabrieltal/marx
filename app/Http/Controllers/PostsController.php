<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
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

    public function store(PostCreateRequest $request)
    {
        $this->validateAssociatedTags();

        $post = auth()->user()->posts()->create($request->validated());
        $post->tags()->attach(request('tags'));

        return redirect('/posts')->with('message', 'Published post!');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', [
          'post' => $post,
          'tags' => Tag::all()
        ]);
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $this->validateAssociatedTags();
        $post->update($request->validated());
        $post->tags()->attach(request('tags'));

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

    protected function validateAssociatedTags()
    {
        return request()->validate([
          "tags" => "exists:tags,id"
        ]);
    }
}
