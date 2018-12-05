<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name'              => 'Super Admin',
            'email'             => 'admin@mail.com',
            'username'          => 'admin',
            'role'              => 1,
            'email_verified_at' => now(),
            'password'          => '$2y$10$NQUIWcXCKAkywZrEh1YE4.jyAVgTWsmg4/lIAuu94oCoGXrgkByaC', // 123456
            'photo'             => null,
            'remember_token'    => str_random(10),
        ];

        return User::create($user);
    }
}
