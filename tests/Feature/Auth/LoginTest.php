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
            'email'    => 'username@example.net',
            'password' => bcrypt('secret'),
            'role'     => 1
        ]);

        $this->visit('/login')
             ->submitForm('Login', [
                 'email'    => $user->email,
                 'password' => 'secret',
             ]);

        if ($isAdmin) {
            $this->visit('/admin');
        } else {
            $this->visit('/home');
        }

        $this->seeText('Dashboard');
    }
}
