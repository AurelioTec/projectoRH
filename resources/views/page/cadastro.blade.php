@extends('base.base')
@section('titulo')
Cadastro
@endsection

@section('gestao')
@if($usuario!=null)
<h1>Nome de usuario: {{$usuario}}</h1> <br>
<h1>Telefone: {{$telf}}</h1>
@endif

@endsection
