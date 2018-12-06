<?php

namespace Tests\Feature\Auth\Admin;

use Tests\Feature\Auth\LoginTest as TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function AdminLogin()
    {
        $this->LoginUser(true);
    }
}
