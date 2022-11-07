@extends('layout.app')
@section('title','Listagem de Músicas')
@section('content')
<br>
<div class="card w-50 m-auto">
@php
            $nomeimagem = "";
            if(file_exists("./img/musicas/".md5($musica->id).".jpg")) {
                $nomeimagem = "./img/musicas/".md5($musica->id).".jpg";
            } elseif (file_exists("./img/musicas/".md5($musica->id).".png")) {
                $nomeimagem = "./img/musicas/".md5($musica->id).".png";
            } elseif (file_exists("./img/musicas/".md5($musica->id).".gif")) {
                $nomeimagem =  "./img/musicas/".md5($musica->id).".gif";
            } elseif (file_exists("./img/musicas/".md5($musica->id).".webp")) {
                $nomeimagem = "./img/musicas/".md5($musica->id).".webp";
            } elseif (file_exists("./img/musicas/".md5($musica->id).".jpeg")) {
                $nomeimagem = "./img/musicas/".md5($musica->id).".jpeg";
            } else {
                $nomeimagem = "./img/musicas/sem-foto.jpg";
            }
        @endphp

        {{Html::image(asset($nomeimagem),'Foto de '.$musica->nome,["class"=>"img-thumbnail"])}}

<div class="card-header">
    <h1>Música - {{$musica->nome}}</h1>
</div>
<div class="card-body">
        <h3 class="card-title">ID: {{$musica->id}}</h3>
        <p class="text">Data de Lançamento: {{$musica->datalancamento}}</a><br/>
        Artista: {{$musica->artista_id}} - {{$musica->artista->nomeartistico}}<br/>
        Álbum: {{$musica->álbum}}</p>
</div>
<div class="card-footer">
        {{Form::open(['route' => ['musicas.destroy',$musica->id],'method' => 'DELETE'])}}
        @if ($nomeimagem !== "./img/musicas/sem-foto.jpg")
                {{Form::hidden('foto',$nomeimagem)}}
                @endif
        <a href="{{url('musicas/'.$musica->id.'/edit')}}" class="btn btn-warning">Alterar</a>
        {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
        <a href="{{url('musicas/')}}" class="btn btn-success">Voltar</a>
        {{Form::close()}}
</div>
</div>
</div>
@endsection