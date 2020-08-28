<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use Facades\Tests\Setup\PostFactory;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_expect_belongs_to_user()
    {
        $post = PostFactory::create();

        $this->assertInstanceOf('App\User', $post->user);
    }

    public function test_expects_has_tags()
    {
        $post = PostFactory::create();

        $this->assertInstanceOf(Collection::class, $post->tags);
    }

    public function test_expects_has_comraderies()
    {
        $post = PostFactory::create();

        $this->assertInstanceOf(Collection::class, $post->comraderies);
    }

    public function test_expects_has_comments()
    {
        $post = PostFactory::create();

        $this->assertInstanceOf(Collection::class, $post->comments);
    }

    public function test_expects_isPublished_to_return_boolean_based_on_published_at()
    {
        // Arrange
        $post = PostFactory::create();

        // Assume
        $this->assertEquals(null, $post->published_at);
        $this->assertFalse($post->isPublished());

        // Act
        $post->published_at = NOW();
        $post->save();

        // Assert
        $this->assertNotEquals(null, $post->published_at);
        $this->assertTrue($post->isPublished());
    }

    public function test_expects_hasGivenComraderie_to_check_if_user_has_made_comradery()
    {
        // Arrange
        $user = $this->signIn();
        $post = PostFactory::create();

        // Assume
        $this->assertCount(0, $post->comraderies);

        // Act
        $user->giveComraderie($post);
        $post->refresh();

        // Assert
        $this->assertTrue($post->comraderies->contains(auth()->user()));
        $this->assertTrue($post->hasGivenComraderie(auth()->user()));
    }
}
