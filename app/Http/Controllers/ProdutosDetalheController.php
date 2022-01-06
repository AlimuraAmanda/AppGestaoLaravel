<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\ProdutosDetalhe;
use App\Models\ItemDetalhe;

class ProdutosDetalheController extends Controller
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
        $unidades = Unidade::all();
        return view('app.produtos_detalhe.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutosDetalhe::create($request->all());
        echo 'Cadastro realizado com sucesso !';
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
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtosDetalhe = ItemDetalhe::with(['item'])->find($id);
        $unidades = Unidade::all();
        return view('app.produtos_detalhe.edit', ['produtos_detalhe' => $produtosDetalhe, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\ProdutosDetalhe $produtosDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutosDetalhe $produtosDetalhe)
    {
        $produtosDetalhe->update($request->all());
        echo 'Atualização foi realizada com sucesso !';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\ProdutosDetalhe $produtosDetalhe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
