<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\DashboardBRI;
use Illuminate\Http\Request;
use App\Helpers\ApiUserBRIFormatter;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ApiDashboardBRIFormatter;

class MemberFoodRushController extends Controller
{

    public function login(Request $request)
    {


        $data = Member::join('member_detail', 'member_detail.member_id', '=', 'member.id')->get(['member_detail.email', 'member.password', 'member.id']);

        if (!$request->email || !$request->password) {
            return ApiUserBRIFormatter::createApi(400, 'Email atau password tidak boleh kosong');
        }
        /** Mengecek username dan password sesuai, jika sesuai membuat token baru &s menampilkan api message tersebut */
        if (Auth::guard('member')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('member')->user();
            $token = $user->createToken('member_token', ['member'])->plainTextToken;



            return ApiUserBRIFormatter::createApi(200, 'Success', $token);
        } else {
            return ApiUserBRIFormatter::createApi(400, 'Username atau Password salah');
        }
    }

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