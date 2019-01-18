<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

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

    /**
     * @test
     */
    public function a_user_can_follow_another()
    {
        //Create users
        $users = factory(User::class, 2)->create();

        //Follow request
        $this->actingAs($users->first())->post('/user/'.$users->last()->id);

        $this->assertDatabaseHas('follows', [
            'user_1' => $users->first()->id,
            'user_2' => $users->last()->id,
        ]);
    }
}
