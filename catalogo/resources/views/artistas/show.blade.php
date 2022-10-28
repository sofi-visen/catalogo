@extends('layout.app')
@section('title','Listagem de Artistas')
@section('content')
    <h1>Artista - {{$artista->nomeartistico}}</h1>
    <ul>
        <li>ID: {{$artista->id}}</li>
        <li>Nome: {{$artista->nomecompleto}}</li>
        <li>País: {{$artista->pais}}</li>
</ul>
{{Form::open(['route'=>['artistas.destroy',$artista->id],'method'=>'DELETE'])}}
<a href="{{url('artistas/'.$artista->id.'/edit')}}" class="btn btn-warning">Alterar</a>
{{Form::submit('Excluir',['class'=>'btn btn-danger'])}}
<a class="btn btn-success" href="{{url('artistas')}}">Voltar</a>
{{Form::close()}}
@endsection