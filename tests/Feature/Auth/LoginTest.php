<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function LoginUser($isAdmin = false)
    {
        $user = factory(User::class)->create([
            'email'    => 'test@user-mail.net',
            'password' => bcrypt('secret'),
        ]);

        $this->visit('/home');

        $this->seePageIs('/login')
             ->submitForm('Login', [
                 'email'    => $user->email,
                 'password' => 'secret',
             ])
             ->seePageIs('/home');
    }
}
