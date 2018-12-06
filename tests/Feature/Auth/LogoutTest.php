<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function LogoutUser($isAdmin = false)
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        if ($isAdmin) {
            $this->visit('/admin');
        } else {
            $this->visit('/home');
        }

        $this->post('/logout');
    }
}
