<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function LogoutUser()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
             ->visit('/home')
             ->post('/logout');
    }
}
