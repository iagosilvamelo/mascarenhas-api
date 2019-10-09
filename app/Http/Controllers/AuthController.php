<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LogUseController;
use App\Http\Controllers\Controller;

use App\Http\Models\Users;
use App\Http\Models\People;

use Illuminate\Support\Facades\Hash;
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

        //  Usuário logado
        if ( !empty($user) && $user->online == 1 )
        {
            $login = LogUseController::getLogin($user->id);
            $msg = 'Usuário logado no IP ' . $login->ip;

            return response()->json(['status' => 'error', 'result' => $msg]);
        }

        else if ( !empty($user) && Hash::check($request->input('password'), $user->password) )
        {
            $str = rand(10000000, 100000000) . md5( $user->username ) . rand(10000000, 100000000);
            $apikey = base64_encode( $str );

            LogUseController::register($user->id, 'Login');

            Users::where('username', $request->input('username'))->update([ 
                'remember_token' => "$apikey",
                'online' => 1
            ]);

            $people = People::find( $user->people_id );

            return response()->json( ['status' => 'success','api_key' => $apikey, 'user' => $people] );
        }

        else
        {
            return response()->json(['status' => 'error', 'result' => 'Usuário ou senha incorreto.']);
        }
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function logof(Request $request)
    {
        $user = Users::where('remember_token', $request->input('api_token'))->first();

        if ( !empty($user) )
        {
            $user->online = 0;
            $user->remember_token = null;
            $user->save();

            LogUseController::register($user->id, 'Logof');

            return response()->json(["status" => "success", "result" => "Logof efetuado com sucesso."]);
        }
        
        else
        {
            return response()->json(["status" => "error", "result" => "Usuário não Autorizado."], 401);
        }
    }
}