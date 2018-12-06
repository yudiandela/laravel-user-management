<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function LoginUser()
    {
        $user = factory(User::class)->create([
            'email'    => 'username@example.net',
            'password' => bcrypt('secret'),
        ]);

        $this->visit('/login')
             ->submitForm('Login', [
                 'email'    => $user->email,
                 'password' => 'secret',
             ])
             ->seePageIs('/home')
             ->seeText('Dashboard');
    }
}
