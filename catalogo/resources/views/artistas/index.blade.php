@extends('layout.app')
@section('title','Listagem de Artistas')
@section('content')
<br><br>
@if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <div class="container">
     <h1>Listagem de Artistas</h1>
    <br>
    {{Form::open(['url'=>'artistas/buscar','method'=>'GET'])}}
    <div class="col-sm-4">
                <div class="input-group ml-5">
                    @if($busca !== null)
                        &nbsp;<a class="btn btn-info" href="{{url('contatos/')}}">Todos</a>&nbsp;
                    @endif
                    {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                    &nbsp;
                    <span class="input-group-btn">
                        {{Form::submit('Buscar',['class'=>'btn btn-warning'])}}
                    </span>
                </div>
            </div>
        </div>
        <br><br>
    {{Form::close()}}
    <table class="table table-striped">
        @foreach ($artistas as $artista)
            <tr>
                <td>
            <a href="{{url('artistas/'.$artista->id)}}">
                {{$artista->nomeartistico}}</a>
</td>
</tr>
@endforeach
</table>
<br>
<h5>Novo Artista:</h5>
<div class="col-sm-3">
    <a class="btn btn-primary" href="{{url('artistas/create')}}">Cadastrar</a>
</div>
</div>
@endsection
