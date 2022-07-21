<?php

namespace App\Http\Controllers;

use App\Models\MemberVote;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\VoteMember;
use Carbon\Carbon;

class VoteMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** Menampilkan semua data yang ada di database  */
        $data = VoteMember::all();

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

        $votemember = VoteMember::create([
            'member_id' =>  $request->member_id,
            'participants'  =>  $request->participants,
            'vote_number' =>  0,
            'image_path'    => $request->file('image_path')->store('images', 'public'),
            'status'   =>  $request->status,
            'created_at'    => Carbon::now()
        ]);


        $data = VoteMember::where('id', '=', $votemember->id)->get();
        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
}