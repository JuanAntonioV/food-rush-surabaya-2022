<?php

namespace App\Http\Controllers;

use App\Models\UserBRI;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Helpers\ApiUserBRIFormatter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GrahamCampbell\ResultType\Success;
use Illuminate\Validation\ValidationException;


class LoginBRIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** Menampilkan semua data */
        $data = UserBRI::all();

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

    public function login(Request $request)
    {
        if (!$request->username || !$request->password) {
            return ApiUserBRIFormatter::createApi(400, 'Username atau password tidak boleh kosong');
        }
        /** Mengecek username dan password sesuai, jika sesuai membuat token baru &s menampilkan api message tersebut */
        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;
            return ApiUserBRIFormatter::createApi(200, 'Success', $token);
        } else {
            return ApiUserBRIFormatter::createApi(400, 'Username atau Password salah');
        }
    }

    public function logout(Request $request)
    {
        /** Menglogout username & mendelete token yang sedang diakses */

        $token = $request->bearerToken();
        return $token;
        $request->user()->currentAccessToken()->delete();
        return response()->json('Succesful Logout', 200);
    }
}