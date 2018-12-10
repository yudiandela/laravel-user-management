<?php

namespace Tests\Feature;

use Tests\UserAuth;
use App\Models\User;

class UserTest extends UserAuth
{
    /** @test */
    public function UserList()
    {
        // Login user sebagai admin
        $this->adminLogin();

        // Kunjungi halaman admin/user
        $this->visit('admin/user');

        // Lihat text Users Table
        $this->see('Users Table');
    }

    /** @test */
    public function CreateNewUser()
    {
        // Login user sebagai admin
        $this->adminLogin();

        // Kunjungi Halaman admin/user/create
        $this->visit('admin/user/create');

        // Lihat text (Add New User)
        $this->seeText('Add New User');

        // Submit form dengan data
        $this->type('John Doe', 'name')                         // Masukkan inputan name
             ->type('john.doe@mail.com', 'email')               // Masukkan inputan email
             ->type('johndoe', 'username')                      // Masukkan inputan username
             ->select(3, 'role')                                // Masukkan inputan role
             ->attach('public/images/no-image.jpg', 'photo')    // Upload photo
             ->press('Submit');

        // Redirect ke halaman /admin/user
        $this->seePageIs('/admin/user');

        // Lihat text hasil inputan
        $this->seeText('Berhasil menambahkan data user John Doe');
    }

    /** @test */
    public function UpdateUser()
    {
        // Login user sebagai admin
        $this->adminLogin();

        // Input sebuah id untuk user
        $user = factory(User::class)->create([
            'id'   => 100
        ]);

        // Kunjungi halaman user list
        $this->visit('admin/user/' . $user->id . '/edit');

        // Lihat value/text dengan nama user yang akan di edit
        $this->see($user->name);

        // Submit form dengan data baru
        $this->submitForm('Submit', [
            '_method' => 'PUT',
            'name'    => 'Name Update',
            'username' => 'username_update'
        ]);

        // Redirect halaman ke admin/user
        $this->seePageIs('admin/user');

        // Lihat pesan berhasil
        $this->see('Berhasil mengubah data user');
    }

    /** @test */
    public function AddTrashUser()
    {
        // Login user sebagai admin
        $this->adminLogin();

        // Buat sebuah user dengan role 99
        $user_delete = factory(User::class)->create();

        // Panggil halaman admin/user/$user_delete->id
        $this->call('delete', 'admin/user/' . $user_delete->id);

        // Kunjungi Halaman admin/user/create
        $this->visit('admin/user/trash');

        // Lihat text (Nama User yang di delete)
        $this->seeText('Berhasil menghapus data user ' . $user_delete->name);
    }

    /** @test */
    public function RestoreUser()
    {
        // Login user sebagai admin
        $this->adminLogin();

        // Buat sebuah user dengan role 99
        $user_delete = factory(User::class)->create();

        // Panggil halaman admin/user/$user_delete->id
        $this->call('delete', 'admin/user/' . $user_delete->id);

        // Kunjungi Halaman admin/user/create
        $this->visit('admin/user/trash');

        // Lihat text (Nama User yang di delete)
        $this->seeText($user_delete->name);

        // Kunjungi halaman admin/user/$user_delete->id/restore
        $this->visit("admin/user/$user_delete->id/restore");

        // Redirect halaman ke admin/user/trash
        $this->seePageIs('admin/user/trash');

        // Lihat pesan berhasil hapus secara permanent
        $this->seeText('Data ' . $user_delete->name . ' sudah berhasil di kembalikan');
    }

    /** @test */
    public function DeleteUserPermanent()
    {
        // Login user sebagai admin
        $user = $this->adminLogin();

        // Buat sebuah user dengan role 99
        $user_delete = factory(User::class)->create();

        // Panggil halaman admin/user/$user_delete->id
        $this->call('delete', 'admin/user/' . $user_delete->id);

        // Kunjungi Halaman admin/user/create
        $this->visit('admin/user/trash');

        // Lihat text (Nama User yang di delete)
        $this->seeText($user_delete->name);

        // Kunjungi halaman admin/user/$user_delete->id/force
        $this->visit("admin/user/$user_delete->id/force");

        // Redirect halaman ke admin/user/trash
        $this->seePageIs('admin/user/trash');

        // Lihat pesan berhasil hapus secara permanent
        $this->seeText('Data ' . $user_delete->name . ' sudah berhasil di hapus secara permanent');
    }
}
