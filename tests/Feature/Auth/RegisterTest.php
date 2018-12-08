<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function RegisterNewUser()
    {
        // Kunjungi halaman /register
        $response = $this->call('GET', '/register');

        // Halaman tidak di temukan 404
        $this->assertEquals(404, $response->status());
    }
}
