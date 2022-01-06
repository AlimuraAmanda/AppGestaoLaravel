@extends('app.layouts.basico')

@section('titulo', 'Home')

@section('conteudo')

<div class="conteudo-destaque">

    <div class="centro">
        <div class="informacoes">
            <h1>Sistema Super Gestão</h1>
            <br>
            <p>Bem vindo ao Gerenciamento do Sistema Super Gestão !<p>
            <br>
            <div class="chamada2">
                <img src="{{ asset('/img/check.png') }}">
                <span class="texto-branco">Gestão de Clientes</span>
            </div>
            <div class="chamada2">
                <img src="{{ asset('/img/check.png') }}">
                <span class="texto-branco">Gestão de Pedidos</span>
            </div>
            <div class="chamada2">
                <img src="{{ asset('/img/check.png') }}">
                <span class="texto-branco">Gestão de Fornecedores</span>
            </div>
            <div class="chamada2">
                <img src="{{ asset('/img/check.png') }}">
                <span class="texto-branco">Gestão de Produtos</span>
            </div>
        </div>
    </div>
</div>
@endsection