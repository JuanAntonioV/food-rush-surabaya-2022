<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{

    public $timestamps = false;
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'member';

    protected $guarded = [];

    protected $hidden = [
        'remember_token',
    ];
}