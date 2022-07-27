<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\DashboardBRI;
use Illuminate\Http\Request;
use App\Helpers\ApiUserBRIFormatter;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ApiDashboardBRIFormatter;
use DB;
class MemberFoodRushController extends Controller
{

    public function login(Request $request)
    {


        // $data = Member::join('member_detail', 'member_detail.member_id', '=', 'member.id')->get(['member_detail.email', 'member.password', 'member.id']);

        if (!$request->email || !$request->password) {
            return ApiUserBRIFormatter::createApi(400, 'Email atau password tidak boleh kosong');
        }
        $member = Member::join('member_detail', 'member_detail.member_id', '=', 'member.id')
                ->where('member_detail.email', $request->email)
                ->where('member.password', md5($request->password))
                ->select('member.id as id')
                ->first();
        if($member){
            $token = md5($member->id.date('Y-m-d H:i:s'));
            DB::table("member_token")->insert(
                [
                    "member_id" => $member->id,
                    "token" => $token,
                    "gadget" => 0,
                    "browser" => "",
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                ]
                );
            return ApiUserBRIFormatter::createApi(200, 'Logging in...', $token);
        }else{
            return response()->json(["code" => 401, "message" => "Username/Password salah"]);
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