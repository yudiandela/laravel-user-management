<?php

namespace Tests\Feature\Auth\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function AdminLogin()
    {
        $user = factory(User::class)->create([
            'email'    => 'test@admin-mail.net',
            'password' => bcrypt('secret'),
            'role'     => 1,
        ]);

        $this->visit('/admin');

        $this->seePageIs('/login')
             ->submitForm('Login', [
                 'email'    => $user->email,
                 'password' => 'secret',
             ])
             ->seePageIs('/admin');
    }
}
