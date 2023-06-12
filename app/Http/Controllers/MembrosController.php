<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Membro;

use Illuminate\Http\Request;

class MembrosController extends Controller
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
        $membro = new Membro;

        if($request->hasFile('foto'))
        {
            $nome_foto = base64_encode(file_get_contents($request->file('foto')));
        }

        $membro->nome = $request->input('nome');
        $membro->cargo = $request->input('cargo');
        $membro->foto = $nome_foto;
        $membro->coordenadoria = $request->input('coordenadoria');
        $membro->horario = $request->input('horario');

        $membro->save();
        return redirect('/membros');
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
        $membro = Membro::find($id);

        if($request->hasFile('foto'))
        {
            $nome_foto = base64_encode(file_get_contents($request->file('foto')));
        }

        $membro->nome = $request->input('nome');
        $membro->cargo = $request->input('cargo');
        $membro->foto = $nome_foto;
        $membro->coordenadoria = $request->input('coordenadoria');
        $membro->horario = $request->input('horario');

        $membro->save();
        return redirect('/membros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $current = Membro::find($id);
        $current->delete();

        return redirect('/membros');
    }
    public function buscar(Request $request){
        $pesquisar= $request->input('nomebusca');

        if($pesquisar){
            $membros= Membro::where('nome','like', '%'.strtoupper($pesquisar).'%')->orWhere('casa','like','%'.($pesquisar).'%')->get();
            return view('membros')->with('membros', $membros);
        }else{
            $bruxos= Membro::orderBy('nome')->get();
            return view('membros')->with('membros', $membros);
        }
    }
}
