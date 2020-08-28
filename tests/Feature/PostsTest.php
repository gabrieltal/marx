<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Facades\Tests\Setup\PostFactory;

class PostsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_expects_user_can_create_a_post()
    {
        // Arrange
        $this->signIn();
        $attributes = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->sentence,
            'description' => $this->faker->sentence
         ];

        // Act
        $this->post('/posts', $attributes);

        // Assert
        $this->assertDatabaseHas('posts', $attributes);
    }

    public function test_expects_errors_if_missing_required_fields()
    {
        // Arrange
        $this->signIn();

        // Act/Assert
        $this->post('/posts', [])
            ->assertSessionHasErrors('title')
            ->assertSessionHasErrors('body');
    }

    public function test_expects_anyone_can_view_a_post()
    {
        // Arrange
        $post = PostFactory::create();

        // Act/Assert
        $this->get($post->path())
            ->assertSee($post->title)
            ->assertSee($post->body);
    }

    public function test_expects_redirect_when_guest_attempts_post_create()
    {
        // Act/Assert
        $this->post('/posts', [
            'title' => $this->faker->sentence,
            'body' => $this->faker->sentence,
            'description' => $this->faker->sentence
        ])->assertForbidden();
    }

    public function test_expects_author_can_see_edit_post()
    {
        // Arrange
        $user = $this->signIn();
        $post = PostFactory::create($user);

        // Act/Assert
        $this->get($post->path())->assertSee('Edit');
        $this->get($post->path() . "/edit")
            ->assertSee('Edit post')
            ->assertSee($post->title)
            ->assertSee($post->body);
    }

    public function test_expects_author_can_update_post()
    {
        // Arrange
        $user = $this->signIn();
        $post = PostFactory::create($user);
        $attributes = ['title' => 'overthrowing capitalist systems',
                       'body' => $post->body,
                       'description' => $post->description];

        // Assume
        $this->assertEquals($user->id, $post->user->id);

        // Act
        $this->patch($post->path(), $attributes);

        // Act/Assert
        $this->assertEquals($attributes['title'], $post->refresh()->title);
        $this->assertDatabaseHas('posts', $attributes);
    }

    public function test_expects_redirect_when_guest_attempts_to_edit_unauthored_post()
    {
        // Arrange
        $user = $this->signIn();
        $post = PostFactory::create();

        // Assume
        $this->assertNotEquals($user, $post->user);

        // Act/Assert
        $this->patch($post->path())->assertForbidden();
        $this->get($post->path() . "/edit")->assertForbidden();
    }
}
