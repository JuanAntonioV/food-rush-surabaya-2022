<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameScore extends Model
{
    use HasFactory;

    protected $table = 'food_rush_game';


    protected $primaryKey = 'member_id';
    protected $guarded = [];
}