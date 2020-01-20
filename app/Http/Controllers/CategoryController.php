<?php

namespace App\Http\Controllers;

use DB;
use App\Pelicula;
use App\Categoria;
use App\Comentario;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Carga una categoria en concreto
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $bannerFilms = Pelicula::where('posicion','banner')->get();
        $comentariosCritica = Comentario::orderByRaw('id DESC')->limit(4)->get();
        $categorias = Categoria::all();
        $lastFilms = Pelicula::orderByRaw('id DESC')->limit(3)->get();
        $searchCategory = $this->checkCategory($id);
        if($searchCategory){
            $films = Pelicula::where('cat_id',Categoria::select('id')->where('id', $id)->get()->first()->id)->paginate(6);
            return view('general.Home.home', compact('bannerFilms','films','lastFilms','comentariosCritica','categorias','searchCategory'));        
        }else{
            abort(403, 'Categoria no encontrada');   
        }
    }

    /**
     * Comprueba existencia.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkCategory($id)
    {
        if(Categoria::where('id', $id)->count() > 0){
            return Categoria::select('nombre')->where('id', $id)->get()->first()->nombre;
        }else{
            return null;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the name of the category
     *
     * @return \Illuminate\Http\Response
     */
    static function getCategoryName($id)
    {
        return Categoria::select('nombre')->where('id', $id)->get()->first()->nombre;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
