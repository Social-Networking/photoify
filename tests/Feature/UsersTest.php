<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function a_user_can_create_an_account()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'name' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'secret', // secret
            'password_confirmation' => 'secret', // secret
        ];

        $this->post('/register', $attributes);

        $this->assertDatabaseHas('users', [
            'name' => $attributes['name'],
            'email' => $attributes['email'],
        ]);
    }
}
