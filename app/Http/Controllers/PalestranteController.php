<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Palestrante;
use Illuminate\Http\Request;

class PalestranteController extends Controller
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
        return response()->json( ['status' => 'success', 'result' => Palestrante::all()] );
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $palestrante = Palestrante::find($id);

        return ( empty($palestrante) ) 
            ? response()->json( ['status' => 'error', 'result' => "Palestrante não encontrado"] )
            : response()->json( ['status' => 'success', 'result' => $palestrante] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $palestrante = Palestrante::create($request->all());

        return response()->json( ['status' => 'success', 'result' => $palestrante] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ligaapi\Palestrante  $palestrante
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $palestrante = Palestrante::find($id);

        if ( !empty($palestrante) )
        {
            $palestrante->nome      = $request->input('nome');
            $palestrante->curriculo = $request->input('curriculo');
            $palestrante->save();
     
            return response()->json(["status" => "success", "reqult" => $palestrante]);
        }

        else return response()->json(["status" => "error", "result" => "Palestrante não encontrado."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ligaapi\Palestrante  $palestrante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Palestrante::find($id);

        if ( !empty($user) )
        {
            $user->delete();
            return response()->json(['status' => 'success', 'result' => 'Palestrante removido com sucesso.']);
        }
        
        else return response()->json(["status" => "error", "result" => "Palestrante não encontrado."]);
    }
}