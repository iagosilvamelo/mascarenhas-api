<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json( ['status' => 'success', 'result' => Users::all()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $email    = Users::where('email', $request->get('email'))->count();
        $username = Users::where('username', $request->get('username'))->count();

        if     ( $email    != 0 ) return response()->json(["ERRO" => "Email já cadastrado."]);
        elseif ( $username != 0 ) return response()->json(["ERRO" => "Username já cadastrado."]);

        else 
        {
            $user = Users::create($request->all());
            AuthController::make_pwd($user->id, $request->get("password"));

            return response()->json( ['status' => 'success', 'result' => $user] );
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( ['status' => 'success', 'result' => Users::find($id)] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ligaapi\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = Users::find($id);

        if ( !empty($user) )
        {
            $user->username  = $request->input('username');
            $user->password  = $request->input('password');
            $user->people_id = $request->input('people_id');
            $user->type      = $request->input('type');
            $user->status    = $request->input('status');
            $user->save();
     
            return response()->json($user);
        }

        else return response()->json(["status" => "error", "result" => "Usuário não encontrado."], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ligaapi\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Users::find($id);

        if ( !empty($user) )
        {
            $user->delete();
            return response()->json(['status' => 'success', 'result' => 'Usuário removido com sucesso.']);
        }
        
        else return response()->json(["status" => "error", "result" => "Usuário não encontrado."], 400);
    }
}