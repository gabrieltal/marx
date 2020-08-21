<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostsController extends Controller
{
    public function show($slug)
    {
        return view("posts.show", [
            "post" => Post::where('slug', $slug)->firstOrFail()
        ]);
    }

    public function index()
    {
        return view("posts.index", [
            "posts" => Post::all()
        ]);
    }
}
