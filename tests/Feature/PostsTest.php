<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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

    public function test_expects_errors_if_missing_required_field()
    {
        // Arrange
        $this->signIn();

        // Act/Assert
        $this->post('/posts', [])->assertSessionHasErrors('title');
    }

    public function test_expects_user_can_view_a_post()
    {
        // Arrange
        $project = factory('App\Post')->create();

        // Act/Assert
        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->body);
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
}
