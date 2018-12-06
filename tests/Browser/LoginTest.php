<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test LoginAdmin.
     *
     * @return void
     */
    /** @test */
    public function LoginUser()
    {
        $user = factory(User::class)->create([
            'name'  => 'Administrator',
            'email' => 'admin@email.com',
            'role'  => 1
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 123456)
                    ->press('Login')
                    ->assertPathIs('/admin');
        });
    }
}
