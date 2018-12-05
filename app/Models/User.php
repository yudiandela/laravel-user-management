<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'role', 'password', 'photo',
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

    public function getUserImageAttribute()
    {
        $photo = Storage::url('images/' . $this->photo);

        if ($this->photo == null) {
            $photo = 'images/no-image.jpg';
        }

        return asset($photo);
    }
}
