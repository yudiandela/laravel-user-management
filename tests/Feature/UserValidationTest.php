<?php

namespace Tests\Feature;

use Tests\UserAuth;

class UserValidationTest extends UserAuth
{
    /** @test */
    public function CreateUserRequiredValidation()
    {
        // Login user sebagai admin
        $this->adminLogin();

        // Submit form create user dengan field name kosong
        $this->post('/admin/user', [
            'name'     => '',
            'email'    => '',
            'username' => '',
            'photo'    => ''
        ]);

        // Cek session error untuk field ['name', 'email', 'username', 'photo'].
        // return true
        $this->assertSessionHasErrors(['name', 'email', 'username', 'photo']);
    }
}
