@extends('layout.app')
@section('title','Alteração de Música {{$musica->nome}}')
@section('content')
<br>
    <h1>Alteração de Música {{$musica->nome}}</h1>
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
    {{Form::open(['route' => ['musicas.update',$musica->id], 'method' => 'PUT','enctype'=>'multipart/form-data'])}}
    {{Form::label('nome', 'Nome')}}
    {{Form::text('nome', $musica->nome,['class'=>'form-control','required', 'placeholder'=>'nome'])}}
    {{Form::label('datalancamento', 'Data Lançamento')}}
    {{Form::text('datalancamento', $musica->datalancamento,['class'=>'form-control','required', 'placeholder'=>'lançamento'])}}
    {{Form::label('artista', 'Artista')}}
    {{Form::text('artista', $musica->artista,['class'=>'form-control','required', 'placeholder'=>'artista'])}}
    {{Form::label('álbum', 'Álbum')}}
    {{Form::text('álbum', $musica->álbum,['class'=>'form-control','required', 'placeholder'=>'album'])}}
    {{Form::label('foto', 'Foto')}}
    {{Form::file('foto', ['class'=>'form-control', 'id'=>'foto'])}}     
    <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        <a href="{{url('musicas')}}" class="btn btn-warning">Voltar</a>
    {{Form::close()}}
@endsection