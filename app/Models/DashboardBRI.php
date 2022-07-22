<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardBRI extends Model
{
    use HasFactory;

    protected $table = 'food_rush_member';

    protected $primaryKey = 'member_id';



    protected $guarded = [];
}