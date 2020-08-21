<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'body'];

    public function path()
    {
        return route('posts.show', $this);
    }
}
