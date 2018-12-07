<?php

namespace Tests\Browser\Auth;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserLogoutTest extends DuskTestCase
{
    // use DatabaseMigrations;

    /** @test */
    public function UserLogout()
    {
        $user = User::find(2);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 123456)
                    ->press('Login')
                    ->assertSee('You are logged in!')
                    ->assertPathIs('/home');
        });
    }
}
