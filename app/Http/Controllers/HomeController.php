<?php

namespace App\Http\Controllers;

use DB;
use App\Pelicula;
use App\Categoria;
use App\Comentario;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bannerFilms = Pelicula::where('posicion','banner')->get();
        $comentariosCritica = Comentario::orderByRaw('id DESC')->limit(4)->get();
        $categorias = Categoria::all();
        $lastFilms = Pelicula::orderByRaw('id DESC')->limit(3)->get();
        $films = Pelicula::all();
        return view('general.Home.home', compact('bannerFilms','films','lastFilms','comentariosCritica','categorias'));  
    }
}
