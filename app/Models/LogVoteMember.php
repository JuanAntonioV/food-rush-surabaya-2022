<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogVoteMember extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = ['food_rush_vote_id', 'voters_member_id'];

    public $incrementing = false;

    protected $table = 'food_rush_vote_log_2022';

    protected $guarded = [];
}