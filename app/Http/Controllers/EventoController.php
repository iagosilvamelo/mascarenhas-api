<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
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
        return response()->json( ['status' => 'success', 'result' => Evento::all()] );
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);

        return ( empty($evento) ) 
            ? response()->json( ['status' => 'error', 'result' => "Evento não encontrado"] )
            : response()->json( ['status' => 'success', 'result' => $evento] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $evento = Evento::create($request->all());

        return response()->json( ['status' => 'success', 'result' => $evento] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ligaapi\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $evento = Evento::find($id);

        if ( !empty($evento) )
        {
            $evento->titulo      = $request->input('titulo');
            $evento->date_ini    = $request->input('date_ini');
            $evento->date_fim    = $request->input('date_fim');
            $evento->programa    = $request->input('programa');
            $evento->local       = $request->input('local');
            $evento->tipo        = $request->input('tipo');
            $evento->endereco    = $request->input('endereco');
            $evento->numero      = $request->input('numero');
            $evento->complemento = $request->input('complemento');
            $evento->bairro      = $request->input('bairro');
            $evento->cidade      = $request->input('cidade');
            $evento->uf          = $request->input('uf');
            $evento->cep         = $request->input('cep');
            $evento->site        = $request->input('site');
            $evento->contato     = $request->input('contato');
            $evento->telefone    = $request->input('telefone');
            $evento->save();
     
            return response()->json(["status" => "success", "reqult" => $evento]);
        }

        else return response()->json(["status" => "error", "result" => "Evento não encontrado."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ligaapi\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Evento::find($id);

        if ( !empty($user) )
        {
            $user->delete();
            return response()->json(['status' => 'success', 'result' => 'Evento removido com sucesso.']);
        }
        
        else return response()->json(["status" => "error", "result" => "Evento não encontrado."]);
    }
}