<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Registro;
use App\Models\Membro;
use Illuminate\Http\Request;

class RegistrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $membro = Membro::where('nome', $request->input('nome'))->first();
        if($membro == null){
            $notification = array(
                'message' => "Essa pessoa não está cadastrada!",
                'alert-type' => 'warning'
            );
            return redirect('/home')->with($notification);
        }

        if ($request->input('operacao') == 'Entrada' and $membro->presente == true) {
            $notification = array(
                'message' => "Você já está presente, $membro->nome!",
                'alert-type' => 'warning'
            );
            return redirect('/home')->with($notification);
        }
        elseif ($request->input('operacao') == 'Saída' and $membro->presente == false) {
            $notification = array(
                'message' => "Você já não está presente, $membro->nome!",
                'alert-type' => 'warning'
            );
            return redirect('/home')->with($notification);
        }
        elseif ($request->input('operacao') == 'Saída' and $membro->presente == true) {
            $registro = new Registro;
            $registro->nome = $request->input('nome');
            $registro->operacao = $request->input('operacao');
            $membro->presente = false;

            $registro->save();
            $membro->save();
            $notification = array(
                'message' => "Até mais, $membro->nome, bom descanso!",
                'alert-type' => 'success'
            );
            return redirect('/home')->with($notification);
        }
        else{
            $registro = new Registro;
            $registro->nome = $request->input('nome');
            $registro->operacao = $request->input('operacao');
            $membro->presente = true;

            $registro->save();
            $membro->save();
            $notification = array(
                'message' => "Bem vindo(a), $membro->nome, bom trabalho!",
                'alert-type' => 'success'
            );
            return redirect('/home')->with($notification);
        }
        
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
}
