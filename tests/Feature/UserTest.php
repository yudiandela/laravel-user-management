<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function UserList()
    {
        // Buat sebuah akun sebagai admin
        $user = factory(User::class)->create([
            'role' => 1
        ]);

        // Login sebagai admin
        $this->actingAs($user);

        // Kunjungi halaman admin/user
        $this->visit('admin/user');

        // Lihat text Users Table
        $this->see('Users Table');
    }

    /** @test */
    public function CreateNewUser()
    {
        // Daftar user dengan role 1
        $user = factory(User::class)->create([
            'role' => 1
        ]);

        // Login akun
        $this->actingAs($user);

        // Kunjungi Halaman admin/user/create
        $this->visit('admin/user/create');

        // Lihat text (Add New User)
        $this->seeText('Add New User');

        // Submit form dengan data
        $this->type('John Doe', 'name')  // Masukkan inputan name
             ->type('john.doe@mail.com', 'email') // Masukkan inputan email
             ->type('johndoe', 'username')
             ->select(3, 'role')
             ->attach('public/images/no-image.jpg', 'photo')
             ->press('Submit');

        // Redirect ke halaman /admin/user
        $this->seePageIs('/admin/user');

        // Lihat text hasil inputan
        $this->seeText('John Doe');
    }

    /** @test */
    public function AddTrashUser()
    {
        // Daftar user dengan role 1
        $user = factory(User::class)->create([
            'role' => 1
        ]);

        // Login akun admin
        $this->actingAs($user);

        // Buat sebuah user dengan role 99
        $user_delete = factory(User::class)->create();

        // Panggil halaman admin/user/$user_delete->id
        $this->call('delete', 'admin/user/' . $user_delete->id);

        // Kunjungi Halaman admin/user/create
        $this->visit('admin/user/trash');

        // Lihat text (Nama User yang di delete)
        $this->seeText($user_delete->name);
    }

    /** @test */
    public function RestoreUser()
    {
        // Daftar user dengan role 1
        $user = factory(User::class)->create([
            'role' => 1
        ]);

        // Login akun admin
        $this->actingAs($user);

        // Buat sebuah user dengan role 99
        $user_delete = factory(User::class)->create();

        // Panggil halaman admin/user/$user_delete->id
        $this->call('delete', 'admin/user/' . $user_delete->id);

        // Kunjungi Halaman admin/user/create
        $this->visit('admin/user/trash');

        // Lihat text (Nama User yang di delete)
        $this->seeText($user_delete->name);

        // Kunjungi halaman admin/user/$user->id/restore
        $this->visit("admin/user/$user->id/restore");

        // Redirect halaman ke admin/user/trash
        $this->seePageIs('admin/user/trash');

        // Lihat pesan berhasil hapus secara permanent
        $this->seeText('Berhasil');
    }

    /** @test */
    public function DeleteUserPermanent()
    {
        // Daftar user dengan role 1
        $user = factory(User::class)->create([
            'role' => 1
        ]);

        // Login akun admin
        $this->actingAs($user);

        // Buat sebuah user dengan role 99
        $user_delete = factory(User::class)->create();

        // Panggil halaman admin/user/$user_delete->id
        $this->call('delete', 'admin/user/' . $user_delete->id);

        // Kunjungi Halaman admin/user/create
        $this->visit('admin/user/trash');

        // Lihat text (Nama User yang di delete)
        $this->seeText($user_delete->name);

        // Kunjungi halaman admin/user/$user->id/force
        $this->visit("admin/user/$user->id/force");

        // Redirect halaman ke admin/user/trash
        $this->seePageIs('admin/user/trash');

        // Lihat pesan berhasil hapus secara permanent
        $this->seeText('Berhasil');
    }
}
