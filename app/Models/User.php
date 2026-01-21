<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'role',
        'profile_image',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = true;
}
