<?php

namespace App\Models;

use App\Traits\RolesTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    use RolesTrait;

    const ROLE_ADMIN = 'Administrator';
    const ROLE_USER = 'User';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * check is User has admin Role
     * @return bool
     */
    public function isAdmin(): bool
    {
        return null !== $this->roles()->whereName(self::ROLE_ADMIN)->first();
    }
}
