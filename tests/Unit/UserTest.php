<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_expects_has_posts()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->posts);
    }

    public function test_expects_has_follows()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->follows);
    }

    public function test_expects_has_post_comraderies()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->postComraderies);
    }

    public function test_expects_has_comment_comraderies()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->commentComraderies);
    }

    public function test_expects_has_comments()
    {
      $user = factory('App\User')->create();

      $this->assertInstanceOf(Collection::class, $user->comments);
    }

    public function test_expects_giveComraderie_to_add_a_comraderie()
    {
      // Arrange
      $user = $this->signIn();
      $post = factory('App\Post')->create();

      // Assume
      $this->assertCount(0, $post->comraderies);

      // Act
      $user->giveComraderie($post);
      $post->refresh();

      // Assert
      $this->assertCount(1, $post->comraderies);
    }

    public function test_expects_revokeComraderie_to_add_a_comraderie()
    {
      // Arrange
      $user = $this->signIn();
      $post = factory('App\Post')->create();
      $user->giveComraderie($post);

      // Assume
      $this->assertCount(1, $post->comraderies);

      // Act
      $user->revokeComraderie($post);
      $post->refresh();

      // Assert
      $this->assertCount(0, $post->comraderies);
    }
}
