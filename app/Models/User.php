<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'avatar',
        'password',
        'role',
        'blocked',
        'deleted',
        'registry',
    ];
}
