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
    public function AdminLogin()
    {
        // Daftar user dengan role 1
        $user = factory(User::class)->create([
            'role' => 1
        ]);

        // Kunjungi halaman login
        $this->visit('/login');

        // Submit form login dari data [$user]
        $this->submitForm('Login', [
            'email'    => $user->email,
            'password' => 123456
        ]);

        // Halaman akan redirect ke url /admin
        $this->seePageIs('/admin');
    }

    /** @test */
    public function UserLogin()
    {
        // Daftar user dengan role default
        $user = factory(User::class)->create();

        // Kunjungi halaman /login
        $this->visit('/login');

        // Submit form login dari data [$user]
        $this->submitForm('Login', [
            'email'    => $user->email,
            'password' => 123456,
        ]);

        // Halaman akan redirect ke url /home
        $this->seePageIs('/home');
    }

    /** @test */
    public function Logout()
    {
        // Daftar user dengan role 1
        $user = factory(User::class)->create([
            'role' => 1
        ]);

        // Login akun
        $this->actingAs($user);

        // Kunjungi halaman /admin
        $this->visit('/admin');

        // Buat request (post) ke url /logout
        $this->post('/logout');

        // Kunjungi (lagi) halaman /admin
        $this->visit('/admin');

        // Halaman redirect ke url /login
        $this->seePageIs('/login');
    }
}
