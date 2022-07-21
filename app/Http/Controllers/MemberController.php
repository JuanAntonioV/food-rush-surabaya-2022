<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberVote;
use App\Models\VoteMember;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\LogVoteMember;
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
        $data = Member::query()->take(10)->get();

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
        $member = Member::findOrFail($id);

        
        $voting_access = Member::where('id', $id)->select('voting_access')->get();
        // return $voting_access;
        if($voting_access = '1')
        {
            return ApiFormatter::createApi(200, 'Member sudah di vote');
        }elseif($voting_access = '0')
        {
            // $member->update([
            //     'voting_access'    =>  1,
            // ]);
            // $this->create_log();
            return ApiFormatter::createApi(200, 'Log telah ditambahkan');
        }
        else
        {
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