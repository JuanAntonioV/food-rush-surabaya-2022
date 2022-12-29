<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogGameScore extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'food_rush_game_log';

    protected $guarded = [];
}