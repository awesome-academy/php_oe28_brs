<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
    ];
}
