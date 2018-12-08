<?php

namespace Tests;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAuth extends TestCase
{
    use RefreshDatabase;

    /**
     * login dengan role 1 sebagai admin
     *
     * @return void
     */
    public function adminLogin()
    {
        // Buat sebuah user dengan role admin
        $user = factory(User::class)->create([
            'role' => 1
        ]);

        // Login dengan user admin
        $this->actingAs($user);
    }

    /**
     * login dengan role 99 sebagai user biasa
     *
     * @return void
     */
    public function userLogin()
    {
        // Buat sebuah user dengan role admin
        $user = factory(User::class)->create();

        // Login dengan user admin
        $this->actingAs($user);
    }
}
