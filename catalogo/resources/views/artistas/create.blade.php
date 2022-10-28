@extends('layout.app')
@section('title','Cadastrar novo artista')
@section('content')
    <h1>Cadastar novo artista</h1>
    <br>
    {{Form::open(['route' => 'artistas.store', 'method'=>'POST'])}}
    {{Form::label('nomecompleto', 'Nome Completo')}}
    {{Form::text('nomecompleto', '',['class'=>'form-control','required', 'placeholder'=>'nome'])}}
    {{Form::label('nomeatistico', 'Nome Artistico')}}
    {{Form::text('nomeartistico', '',['class'=>'form-control','required', 'placeholder'=>'nome'])}}
    {{Form::label('idade', 'Idade')}}
    {{Form::text('idade', '',['class'=>'form-control','required', 'placeholder'=>'idade'])}}
    {{Form::label('pais', 'País')}}
    {{Form::text('pais', '',['class'=>'form-control','required', 'placeholder'=>'pais'])}}
    <br><br>
    {{Form::submit('Salvar', ['class'=>'btn btn-success'])}}
    {!!Form::button('Cancelar', ['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-danger'])!!}
    {{Form::close()}}
    @endsection