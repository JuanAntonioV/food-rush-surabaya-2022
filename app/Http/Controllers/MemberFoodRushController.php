<?php

namespace App\Http\Controllers;

use App\Models\DashboardBRI;
use Illuminate\Http\Request;
use App\Helpers\ApiUserBRIFormatter;
use App\Helpers\ApiDashboardBRIFormatter;

class MemberFoodRushController extends Controller
{
    public function addMember(Request $request)
    {
        /** Melakukan validasi */
        if (!$request->no_akun || !$request->nama_akun) {
            return ApiUserBRIFormatter::createApi(400, 'Nomor Akun dan Nama Akun tidak boleh kosong!');
        }

        /** Mendaftar no akun rekening & nama rekening di BRI */
        $dashboardbri = DashboardBRI::create([
            'member_id' =>  $request->member_id,
            'account_name' =>  $request->nama_akun,
            'account_number'   =>  $request->no_akun
        ]);


        if ($dashboardbri) {
            return ApiDashboardBRIFormatter::createApi(200, 'Selamat data kamu sudah tercatat! mohon menunggu');
        } else {
            return ApiDashboardBRIFormatter::createApi(400, 'Failed');
        }
    }
}