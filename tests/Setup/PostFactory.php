<?php

namespace Tests\Setup;

use App\User;
use App\Post;
use App\Comment;

class PostFactory
{
    protected $commentsCount = 0;

    public function withComments($count)
    {
        $this->commentsCount = $count;

        return $this;
    }

    public function create($user = null)
    {
        $user = $user ?: factory(User::class)->create();
        $project = factory(Post::class)->create(['user_id'=> $user->id]);

        factory(Comment::class, $this->commentsCount)->create(['project_id' => $project->id]);

        return $project;
    }
}
