<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberVote;
use App\Models\VoteMember;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\LogVoteMember;
use App\Models\MemberDetail;
use Illuminate\Support\Carbon;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** Menampilkan semua data yang ada di database  */
        $data = Member::all()->select('voting_access', 'id');

        /* Return hasil API */

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /** Menampilkan data sesuai id */

        $data = Member::where('id', '=', $id)->get();

        /* Return hasil API */

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** Mencari member id */
        $member = Member::findOrFail($id);

        /** Mengambil column voting access */
        $voting_access = Member::where('id', $id)->select('voting_access')->first();
        /** Mengambil column phone & email verified */
        $veri_member   = MemberDetail::where('member_id', $id)->select('phone_verified', 'email_verified')->first();

        /** Mengecek apakah sudah verified email dan telepon */
        if ($veri_member->phone_verified == 1 && $veri_member->email_verified == 1) {
            /** Mengecek apakah voting access sudah dipakai */
            if ($voting_access->voting_access == 1) {
                return ApiFormatter::createApi(200, 'Kamu sudah vote tidak bisa ngevote lagi!!', $veri_member);
            } elseif ($voting_access->voting_access == 0) {
                /** Mengupdate voting access menjadi 1 */
                $member->update([
                    'voting_access'    =>  1,
                ]);

                /** Menambah data log vote jika sudah mengvote */
                LogVoteMember::create([
                    'food_rush_vote_id' =>  $request->vote_id,
                    'voters_member_id'  =>  $id,
                    'created_at'    => Carbon::now()
                ]);
                /**Menambah vote number sesuai pilihan tersebut */
                VoteMember::where('id', '=', $request->vote_id)->increment('vote_number', 1);

                return ApiFormatter::createApi(200, 'Terima kasih sudah ngevote!!', $veri_member);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } elseif ($veri_member->phone_verified == 0 && $veri_member->email_verified == 1) {
            return ApiFormatter::createApi(200, 'Mohon verifikasi no telepon terlebih dahulu', $veri_member);
        } elseif ($veri_member->phone_verified == 1 && $veri_member->email_verified == 0) {
            return ApiFormatter::createApi(200, 'Mohon verifikasi no email terlebih dahulu', $veri_member);
        } elseif ($veri_member->phone_verified == 0 && $veri_member->email_verified == 0) {
            return ApiFormatter::createApi(200, 'Mohon verifikasi no email & no telepon terlebih dahulu', $veri_member);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function create_log(Request $request)
    {

        $logvotemember = LogVoteMember::create([
            'food_rush_vote_id' =>  $request->vote_id,
            'voters_member_id'  =>  $request->member_id,
            'created_at'    => Carbon::now()
        ]);
    }
}