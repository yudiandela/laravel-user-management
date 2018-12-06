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
    public function RegisteredUserCanBeLogin()
    {
        // Daftarkan seorang user
        $user = factory(User::class)->create([
            'email'    => 'username@example.net',
            'password' => bcrypt('secret'),
        ]);

        // Buka halaman login
        $this->visit('/login');

        // Masukkan inputan form
        $this->submitForm('Login', [
            'email'    => 'username@example.net',
            'password' => 'secret',
        ]);

        // Lihat halaman ter-redirect ke url '/home' (login sukses).
        $this->seePageIs('/home');
    }

    /** @test */
    public function RegisteredUserCanNotBeLoginValidation()
    {
        // Arahkan ke halaman login
        // dengan method post dengan inputan kosong
        $this->post('/login', [
            'email'    => '',
            'password' => '',
        ]);

        // Cek error yang ada pada session
        $this->assertSessionHasErrors(['email', 'password']);
    }

    /** @test */
    public function LoggedInUserCanLogout()
    {
        // Kita memiliki 1 user terdaftar
        $user = factory(User::class)->create();

        // Login sebagai user tersebut
        $this->actingAs($user);

        // Kunjungi halaman '/home'
        $this->visit('/home');

        // Buat post request ke url '/logout'
        $this->post('/logout');

        // Kunjungi (lagi) halaman '/home'
        $this->visit('/home');

        // User ter-redirect ke halaman '/login'
        $this->seePageIs('/login');
    }
}
