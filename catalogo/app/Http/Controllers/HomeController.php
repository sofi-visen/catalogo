<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;
use App\Models\Musica;

class HomeController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // Passar quantidades de Dados - para criar um DashBoard
        $numArtistas = Artista::all()->count();
        $numMusicas = Musica::all()->count();
        return view('home',array('numArtistas'=>$numArtistas,'numMusicas'=>$numMusicas));
    }
}


