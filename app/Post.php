<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Comraderie;

    protected $fillable = ['title', 'description', 'body'];

    public function path()
    {
        return route('posts.show', $this);
    }

    public function isPublished()
    {
        return ($this->published_at !== null);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
