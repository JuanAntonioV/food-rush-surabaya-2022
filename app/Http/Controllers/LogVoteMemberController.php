<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\LogVoteMember;
use Illuminate\Support\Carbon;

class LogVoteMemberController extends Controller
{
    public function create(Request $request)
    {
        $logvotemember = LogVoteMember::create([
            'food_rush_vote_id' =>  $request->vote_id,
            'voters_member_id'  =>  $request->member_id,
            'created_at'    => Carbon::now()
        ]);


        $data = LogVoteMember::where('voters_member_id', '=', $logvotemember->voters_member_id)->get();
        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}