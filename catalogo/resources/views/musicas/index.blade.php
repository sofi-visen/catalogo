@extends('layout.app')
@section('title','Listagem de Musicas')
@section('content')
<br><br>
@if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <div class="container">
     <h1>Listagem de Músicas</h1>
    <br>
    {{Form::open(['url'=>'musicas/buscar','method'=>'GET'])}}
    <div class="col-sm-4">
                <div class="input-group ml-5">
                    @if($busca !== null)
                        &nbsp;<a class="btn btn-info" href="{{url('musicas/')}}">Todos</a>&nbsp;
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
        @foreach ($musicas as $musica)
            <tr>
                <td>
            <a href="{{url('musicas/'.$musica->id)}}">
                {{$musica->nome}}</a>
</td>
</tr>
@endforeach
</table>
{{$musicas->links()}}
<br>
<h5>Nova Música:</h5>
<div class="col-sm-3">
    <a class="btn btn-primary" href="{{url('musicas/create')}}">Cadastrar</a>
</div>
</div>
@endsection
