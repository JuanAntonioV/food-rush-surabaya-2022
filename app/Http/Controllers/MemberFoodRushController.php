<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\DashboardBRI;
use App\Models\MemberDetail;
use Illuminate\Http\Request;
use App\Helpers\ApiMemberFormmater;
use App\Helpers\ApiUserBRIFormatter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ApiDashboardBRIFormatter;
use DB;
class MemberFoodRushController extends Controller
{

    public function login(Request $request)
    {
<<<<<<< HEAD


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
=======
        $email = MemberDetail::where('email', $request->email)->value('member_id');
        $password = Member::select('password', 'member_token')->where('id', '=', $email)->first();

        if (!$request->email || !$request->password) {
            return ApiMemberFormmater::createApi(400, 'Email atau password tidak boleh kosong');
        } elseif ($email) {
            if ($password->password == md5($request->password)) {

                // $token = $email->createToken('MyApp')->plainTextToken;
                return ApiUserBRIFormatter::createApi(200, 'Login Berhasil');
            } else {
                return ApiUserBRIFormatter::createApi(400, 'Password salah');
            }
        } else {
            return ApiMemberFormmater::createApi(400, 'Email atau password salah');
>>>>>>> dash_BRI
        }



        // $data = Member::join('member_detail', 'member_detail.member_id', '=', 'member.id')->select(['member_detail.email', 'member.password', 'member.id'])->first();
        // return $data;

        // if (!$request->email || !$request->password) {
        //     return ApiUserBRIFormatter::createApi(400, 'Email atau password tidak boleh kosong');
        // }
        // /** Mengecek username dan password sesuai, jika sesuai membuat token baru &s menampilkan api message tersebut */
        // // if (Auth::guard('member')->attempt($request->only('email', 'password'))) {
        // //     $user = Auth::guard('member')->user();
        // //     $token = $user->createToken('member_token', ['member'])->plainTextToken;



        // //     return ApiUserBRIFormatter::createApi(200, 'Success', $token);
        // // } else {
        // //     return ApiUserBRIFormatter::createApi(400, 'Username atau Password salah');
        // // }
        // if ($email == $request->email) {
        //     if ($password == $request->password) {
        //         createToken('member_token')->plainTextToken;
        //     }
        // }
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