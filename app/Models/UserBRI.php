<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBRI extends Model
{
    use HasFactory;

    protected $table = 'user_b_r_i_s';

    protected $fillable = [
        'username',
        'password',
    ];
}
