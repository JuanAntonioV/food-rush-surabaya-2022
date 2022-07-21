<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'member_detail';

    protected $guarded = [];
}