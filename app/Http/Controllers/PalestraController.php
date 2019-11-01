<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\Palestra;
use Illuminate\Http\Request;

class PalestraController extends Controller
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
    public function index(Request $request)
    {
        if ( !empty( $request->get('where') ))
        {
            $where = $request->get('where');
            $value = $request->get('value');

            return response()->json( ['status' => 'success', 'result' => Palestra::where($where, $value)->get()] );
        }

        else if ( !empty( $request->get('like') ))
        {
            $where = $request->get('like');
            $value = $request->get('value');

            return response()->json( ['status' => 'success', 'result' => Palestra::where($where, "LIKE", "%$value%")->get()] );
        }

        else return response()->json( ['status' => 'success', 'result' => Palestra::all()] ); 
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Palestra::find($id);

        return ( empty($evento) ) 
            ? response()->json( ['status' => 'error', 'result' => "Palestra não encontrada"] )
            : response()->json( ['status' => 'success', 'result' => $evento] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $evento = Palestra::create($request->all());

        return response()->json( ['status' => 'success', 'result' => $evento] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ligaapi\Palestra  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $evento = Palestra::find($id);

        if ( !empty($evento) )
        {
            $evento->titulo         = $request->input('titulo');
            $evento->conteudo       = $request->input('conteudo');
            $evento->evento_id      = $request->input('evento_id');
            $evento->palestrante_id = $request->input('palestrante_id');
            $evento->save();
     
            return response()->json(["status" => "success", "reqult" => $evento]);
        }

        else return response()->json(["status" => "error", "result" => "Palestra não encontrada."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ligaapi\Palestra  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Palestra::find($id);

        if ( !empty($user) )
        {
            $user->delete();
            return response()->json(['status' => 'success', 'result' => 'Palestra removido com sucessa.']);
        }
        
        else return response()->json(["status" => "error", "result" => "Palestra não encontrada."]);
    }
}