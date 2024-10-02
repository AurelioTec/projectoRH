@extends('base.base')
@section('titulo')
Inicio
@endsection

@section('gestao')
<!-- comparaao na -->
@if($nome>50)

<h1>{{$nome}}</h1>
@endif
<!-- comparaao na -->

@foreach ([1,2,3,4,5,6,7,8,9] as $item)
<h1>{{$item}}-{{$nome}}</h1>
@endforeach



@endsection
