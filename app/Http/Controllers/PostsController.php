<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($post)
    {
        $posts = [
            "my-first-post" => "Yeooooo",
            "no" => "BOGO"
        ];

        if (! array_key_exists($post, $posts)) {
            abort(404, "Sorry ya messed that up");
        }

        return view("post", [
            "post" => $posts[$post]
        ]);
    }
}
