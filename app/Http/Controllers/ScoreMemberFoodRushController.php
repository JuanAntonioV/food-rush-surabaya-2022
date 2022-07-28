<?php

namespace App\Http\Controllers;

use App\Models\LogGameScore;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\GameScore;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Carbon;

class ScoreMemberFoodRushController extends Controller
{
    public function addLogGame(Request $request)
    {

        $newlog = LogGameScore::create([

            'member_id' => $request->member_id,
            'score'     => $request->score,
            'created_at'    => Carbon::now()
        ]);
        $log_score = LogGameScore::where('member_id', '=', $newlog->member_id)->max('score');
        $member = GameScore::where('member_id', '=', $newlog->member_id)->first();
        if ($member) {
            $member->update([
                'high_score' => $log_score
            ]);
            return response()->json($member, 200);
        } else {
            return response()->json('Failed', 400);
        }
    }
}