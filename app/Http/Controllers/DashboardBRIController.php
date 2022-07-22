<?php

namespace App\Http\Controllers;

use App\Models\DashboardBRI;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Mail\StatusDashboardBRI;
use App\Helpers\ApiUserBRIFormatter;
use Illuminate\Support\Facades\Mail;
use App\Helpers\ApiDashboardBRIFormatter;

class DashboardBRIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        /** Menampilkan semua data yang ada di database  */
        $data = DashboardBRI::all();

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /** Menampilkan data sesuai id */

        $data = DashboardBRI::where('id', '=', $id)->get();

        /* Return hasil API */

        if ($data) {
            return ApiDashboardBRIFormatter::createApi(200, 'Success');
        } else {
            return ApiDashboardBRIFormatter::createApi(400, 'Failed');
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
    public function update(Request $request, $member_id)
    {
        /** Mencari data dashboard BRI ID */
        $dashboardbri = DashboardBRI::findOrFail($member_id);

        /** Melakukan Validate */
        $request->validate(
            [
                'status'    =>  'required',
            ],
            [
                'status.required'  =>  'Status tidak boleh kosong'
            ]
        );

        /** Mengupdate status dashboard BRI */
        $dashboardbri->update([
            'status'    =>  $request->status
        ]);

        /* Return hasil API */

        if ($request->status == "1") {
            // Mail::to('fake@email.com')->send(new StatusDashboardBRI());
            return ApiDashboardBRIFormatter::createApi(200, 'Status change to Approve');
        } elseif ($request->status  == "3") {
            // Mail::to('fake@email.com')->send(new StatusDashboardBRI());
            return ApiDashboardBRIFormatter::createApi(200, 'Status change to Decline');
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

    // public function sendMail()
    // {
    //     Mail::to('fake@email.com')->send(new StatusDashboardBRI());
    //     return view('welcome');
    // }
}