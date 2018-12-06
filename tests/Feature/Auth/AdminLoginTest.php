<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminLoginTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function RegisteredAdminCanBeLogin()
    {
        // daftarkan 1 user dengan role sebagai admin
        $user = factory(User::class)->create([
            'email'    => 'admin@mail.com',
            'password' => bcrypt('secret'),
            'role'     => 1,
        ]);

        // Buka halaman login
        $this->visit('/login');

        // Masukkan inputan form
        $this->submitForm('Login', [
            'email'    => 'admin@mail.com',
            'password' => 'secret',
        ]);

        // Kunjungi halaman admin
        $this->seePageIs('/admin');
    }
}
