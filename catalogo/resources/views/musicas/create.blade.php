@extends('layout.app')
@section('title','Cadastrar nova musica')
@section('content')
<br>
    <h1>Cadastar nova música</h1>
    <br>
    {{Form::open(['route' => 'musicas.store', 'method'=>'POST',
        'enctype'=>'multipart/form-data'])}}
    {{Form::label('nome', 'Nome da Música')}}
    {{Form::text('nome', '',['class'=>'form-control','required', 'placeholder'=>'nome'])}}
    {{Form::label('datalancamento', 'Data de lançamento')}}
    {{Form::text('datalancamento', '',['class'=>'form-control','required', 'placeholder'=>'xxxx'])}}
    {{Form::label('artista', 'Artista')}}
    {{Form::text('artista', '',['class'=>'form-control','required', 'placeholder'=>'artista'])}}
    {{Form::label('álbum', 'Álbum')}}
    {{Form::text('album', '',['class'=>'form-control','required', 'placeholder'=>'nome do album'])}}
    {{Form::label('foto', 'Foto')}}
    {{Form::file('foto', ['class'=>'form-control', 'id'=>'foto'])}}
    <br><br>
    {{Form::submit('Salvar', ['class'=>'btn btn-success'])}}
    {!!Form::button('Cancelar', ['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-danger'])!!}
    {{Form::close()}}
    @endsection