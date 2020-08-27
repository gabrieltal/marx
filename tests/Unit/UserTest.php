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
}
