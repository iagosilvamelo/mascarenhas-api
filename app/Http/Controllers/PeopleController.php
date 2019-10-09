<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
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
        return response()->json( ['status' => 'success', 'result' => People::all()] );
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( ['status' => 'success', 'result' => People::find($id)] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $email = People::where('email', $request->get('email'))->count();

        if ( $email != 0 ) return response()->json(["status" => "error", "result" => "Email já cadastrado."]);

        else 
        {
            $people = People::create($request->all());

            return response()->json( ['status' => 'success', 'result' => $people] );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ligaapi\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $people = People::find($id);
        $email  = People::where('email', $request->get('email'))->count();

        if ( !empty($people) )
        {
            if ($people->email != $request->input('email') && $email != 0 )
            {
                return response()->json(["status" => "error", "result" => "Email já cadastrado."]);
            }

            else
            {
                $people->nome        = $request->input('nome');
                $people->type        = $request->input('type');
                $people->endereco    = $request->input('endereco');
                $people->numero      = $request->input('numero');
                $people->complemento = $request->input('complemento');
                $people->bairro      = $request->input('bairro');
                $people->cidade      = $request->input('cidade');
                $people->uf          = $request->input('uf');
                $people->cep         = $request->input('cep');
                $people->email       = $request->input('email');
                $people->fone        = $request->input('fone');
                $people->celular     = $request->input('celular');
                $people->nascimento  = $request->input('nascimento');
                $people->save();
         
                return response()->json(["status" => "success", "reqult" => $people]);
            }
        }

        else return response()->json(["status" => "error", "result" => "Usuário não encontrado."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ligaapi\People  $People
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = People::find($id);

        if ( !empty($user) )
        {
            $user->delete();
            return response()->json(['status' => 'success', 'result' => 'Usuário removido com sucesso.']);
        }
        
        else return response()->json(["status" => "error", "result" => "Usuário não encontrado."], 400);
    }
}