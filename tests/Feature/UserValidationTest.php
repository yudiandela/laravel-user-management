<?php

namespace Tests\Feature;

use Tests\UserAuth;
use App\Models\User;

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

    /** @test */
    public function DontRemoveUserWithRoleAdminOrStafValidation()
    {
        // Login sebagai admin
        $this->adminLogin();

        // Buat sebuah user dengan role >= 3
        $user = factory(User::class)->create([
            'id'   => 100,
            'name' => 'Remove User',
            'role' => 2
        ]);

        // Kunjungi halaman admin/user
        $this->visit('admin/user');

        // Lihat value/text dengan nama user
        $this->see($user->name);

        // Buat request (post) dengan method 'delete'
        // ke url 'admin/user/' . $user->id
        $this->post('admin/user/' . $user->id, [
            '_method' => 'delete'
        ]);

        // Dapatkan pesan Redirecting
        $this->see('Redirecting');
    }
}
