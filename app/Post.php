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

    public function isPublished()
    {
        return $this->published_at;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }

    public function upvote()
    {
        $this->upvotes()->updateOrCreate(['user_id' => auth()->id()]);
    }

    public function hasUpvoted($user)
    {
        return $this->upvotes()->where('user_id', $user->id)->exists();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
