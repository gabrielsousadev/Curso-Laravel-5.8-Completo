@extends('layouts.principal')
@section('conteudo')
<h3>Novo Cliente</h3>
<form action="{{route('clientes.store')}}" method="POST">
    @csrf
    <input type="text" name="nome">
    <input type="submit" name="salvar">
</form>
@endsection