<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Models\Users;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        //  $this->middleware('auth:api');
    }


    /**
     * Encrypt password to the new user.
     *
     * @return \Illuminate\Http\Response
     */
    public static function make_pwd($id, $pwd)
    {
        $secret = Hash::make($pwd);

        $user = Users::find($id);
        $user->password = $secret;
        $user->save();
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user = Users::where('username', $request->input('username'))->first();

        if ( !empty($user) && Hash::check($request->input('password'), $user->password) )
        {
            $str = rand(100000, 1000000) . Date('iydsHm') . rand(100000, 1000000) . $user->username . rand(100000, 1000000);
            $apikey = base64_encode( $str );

            Users::where('username', $request->input('username'))->update([ 
                'remember_token' => "$apikey",
                'status' => 1
            ]);

            return response()->json( ['status' => 'success','api_key' => $apikey] );
        }

        else
        {
            return response()->json(['status' => 'error', 'result' => 'Usuário ou senha incorreto.'],401);
        }
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function logof(Request $request)
    {
        
    }
}