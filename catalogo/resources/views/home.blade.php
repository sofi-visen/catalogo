@extends('layout.app')
@section('catalogo')
@section('content')
<br><br>
<h1 align="center">Acompanhe os artistas e músicas cadastrados</h1>
<br><br>
<div class="row justify-content-center">
        <div class="col-md-8 bg-secondary text-light">
            <div class="fluid px-3 my-2 h4"></div>
            <div class="row text-center h5">
                <div class="col m-3 bg-info text-light">
                    <div class="card-header p-2">Artistas</div>
                    <div class="card-body h3 p-5">
                        {{$numArtistas}}
                    </div>
                </div>
                <div class="col m-3 bg-warning text-black">
                    <div class="card-header p-2">Músicas</div>
                    <div class="card-body h3 p-5">
                        {{$numMusicas}}
                    </div>
                </div>
            </div>   
        </div>
            <img src="./img/home.jfif">        
@endsection 
