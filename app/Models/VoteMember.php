<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteMember extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'food_rush_vote_2022';

    protected $guarded = [];
}