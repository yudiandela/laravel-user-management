<?php

namespace Tests\Feature\Auth\Admin;

use Tests\Feature\Auth\LogoutTest as TestCase;

class LogoutTest extends TestCase
{
    /** @test */
    public function AdminLogout()
    {
        $this->LogoutUser(true);
    }
}
