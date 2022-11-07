@extends('layout.app')
@section('title','Alteração de Artista {{$artista->nomeartistico}}')
@section('content')
<br>
    <h1>Alteração de Artista {{$artista->nomeartistico}}</h1>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br/>
    {{Form::open(['route' => ['artistas.update',$artista->id], 'method' => 'PUT','enctype'=>'multipart/form-data'])}}
    {{Form::label('nomecompleto', 'Nome Completo')}}
    {{Form::text('nomecompleto', $artista->nomecompleto,['class'=>'form-control','required', 'placeholder'=>'nome'])}}
    {{Form::label('nomeatistico', 'Nome Artistico')}}
    {{Form::text('nomeartistico', $artista->nomeartistico,['class'=>'form-control','required', 'placeholder'=>'nome'])}}
    {{Form::label('idade', 'Idade')}}
    {{Form::text('idade', $artista->idade,['class'=>'form-control','required', 'placeholder'=>'idade'])}}
    {{Form::label('pais', 'País')}}
    {{Form::text('pais', $artista->pais,['class'=>'form-control','required', 'placeholder'=>'pais'])}}
    {{Form::label('foto', 'Foto')}}
    {{Form::file('foto', ['class'=>'form-control', 'id'=>'foto'])}}  
    <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        <a href="{{url('artistas')}}" class="btn btn-warning">Voltar</a>
    {{Form::close()}}
@endsection