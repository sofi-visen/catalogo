@extends('layout.app')
@section('title','Listagem de Artistas')
@section('content')
<br>
<div class="card w-50 m-auto">
@php
            $nomeimagem = "";
            if(file_exists("./img/artistas/".md5($artista->id).".jpg")) {
                $nomeimagem = "./img/artistas/".md5($artista->id).".jpg";
            } elseif (file_exists("./img/artistas/".md5($artista->id).".png")) {
                $nomeimagem = "./img/artistas/".md5($artista->id).".png";
            } elseif (file_exists("./img/artistas/".md5($artista->id).".gif")) {
                $nomeimagem =  "./img/artistas/".md5($artista->id).".gif";
            } elseif (file_exists("./img/artistas/".md5($artista->id).".webp")) {
                $nomeimagem = "./img/artistas/".md5($artista->id).".webp";
            } elseif (file_exists("./img/artistas/".md5($artista->id).".jpeg")) {
                $nomeimagem = "./img/artistas/".md5($artista->id).".jpeg";
            } else {
                $nomeimagem = "./img/artistas/semfoto.webp";
            }
        @endphp

        {{Html::image(asset($nomeimagem),'Foto de '.$artista->nome,["class"=>"img-thumbnail"])}}
<div class="card-header">
    <h1>Artista - {{$artista->nomeartistico}}</h1>
</div>
<div class="card-body">
        <h3 class="card-title">ID: {{$artista->id}}</h3>
        <p class="text">Nome Completo: {{$artista->nomecompleto}}</a><br/>
        Idade: {{$artista->idade}}<br/>
        País: {{$artista->pais}}</p>
</div>
<div class="card-footer">
        {{Form::open(['route' => ['artistas.destroy',$artista->id],'method' => 'DELETE'])}}
        @if ($nomeimagem !== "./img/artistas/semfoto.webp")
                {{Form::hidden('foto',$nomeimagem)}}
                @endif
        <a href="{{url('artistas/'.$artista->id.'/edit')}}" class="btn btn-warning">Alterar</a>
        {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
        <a href="{{url('artistas/')}}" class="btn btn-success">Voltar</a>
        {{Form::close()}}
</div>
</div>
</div>
@endsection