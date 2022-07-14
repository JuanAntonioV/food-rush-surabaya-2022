<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardBRI extends Model
{
    use HasFactory;

    protected $table = 'dashboard_b_r_i_s';

    protected $fillable = [
        'no_akun',
        'nama_akun',
        'status',
    ];
}
