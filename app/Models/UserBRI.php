<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;

class UserBRI extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'user_b_r_i_s';

    protected $fillable = [
        'username',
        'password',
        'UserBRI'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function DeleteToken($id)
    {
        DB::table('personal_access_tokens')->where('id', $id)->delete();
    }
}
