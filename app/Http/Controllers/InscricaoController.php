<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Inscricao;
use Illuminate\Http\Request;

class InscricaoController extends Controller
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
        return response()->json( ['status' => 'success', 'result' => Inscricao::all()] );
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscricao = Inscricao::find($id);

        return ( empty($inscricao) ) 
            ? response()->json( ['status' => 'error', 'result' => "Inscricao não encontrada"] )
            : response()->json( ['status' => 'success', 'result' => $inscricao] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $inscricao = Inscricao::create($request->all());

        return response()->json( ['status' => 'success', 'result' => $inscricao] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ligaapi\Inscricao  $inscricao
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $inscricao = Inscricao::find($id);

        if ( !empty($inscricao) )
        {
            $inscricao->status      = $request->input('status');
            $inscricao->usuario_id  = $request->input('usuario_id');
            $inscricao->palestra_id = $request->input('palestra_id');
            $inscricao->save();
     
            return response()->json(["status" => "success", "reqult" => $inscricao]);
        }

        else return response()->json(["status" => "error", "result" => "Inscricao não encontrada."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ligaapi\Inscricao  $inscricao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Inscricao::find($id);

        if ( !empty($usuario_id) )
        {
            $palestra_id->delete();
            return response()->json(['status' => 'success', 'result' => 'Inscricao removido com sucessa.']);
        }
        
        else return response()->json(["status" => "error", "result" => "Inscricao não encontrada."]);
    }
}