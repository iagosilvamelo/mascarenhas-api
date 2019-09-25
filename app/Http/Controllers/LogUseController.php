<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\LogUse;
use Illuminate\Http\Request;

class LogUseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( ['status' => 'success', 'result' => LogUse::all()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function register($user_id, $action)
    {
        LogUse::insert([
            "date"    => Date('Y-m-d'),
            "time"    => Date('H:i:s'),
            "ip"      => $_SERVER["REMOTE_ADDR"],
            "user_id" => $user_id,
            "action"  => $action
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( ['status' => 'success', 'result' => LogUse::find($id)] );
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getLogin($user_id)
    {
        return LogUse::where('user_id', $user_id)->where('action', 'Login')->orderBy('id', 'desc')->first();
    }
}