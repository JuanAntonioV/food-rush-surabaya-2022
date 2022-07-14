<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserBRI extends Authenticatable
{
    use HasFactory;

    protected $table = 'user_b_r_i_s';

    protected $fillable = [
        'username',
        'password',
        'UserBRI'
    ];
}
