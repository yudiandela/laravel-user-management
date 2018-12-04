<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Show string role
     *
     * @return string
     */
    public function roleString()
    {
        if ($this->role == 1) {
            return 'Super Admin';
        }

        if ($this->role == 2) {
            return 'Admin';
        }

        if ($this->role == 3) {
            return 'Staf';
        }

        return 'Member';
    }
}
