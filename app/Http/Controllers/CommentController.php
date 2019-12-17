<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Exception;
use Redirect;
use App\Comentario;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Get comments of a single film.
     *
     * @return \Illuminate\Http\Response
     */
    static function getComments($id)
    {
        return Comentario::where('id_pelicula', $id)->get();
    }

    /**
     * Show the number of comments of a single film
     *
     * @return \Illuminate\Http\Response
     */
    static function getNumberComents($id)
    {
        return Comentario::where('id_pelicula', $id)->count();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = htmlspecialchars(trim($request->input('pelicula')));
        $texto = htmlspecialchars(trim($request->input('comentario')));
        try {
            if (strlen($texto) < 10){throw new Exception('Longitud minima del comentario 10 caracteres');}
        } catch (\Exception $e) {
            $error = ($e->getMessage());
        }
        if (!isset($error)) {
            Comentario::insert(
                [
                    'id_usuario' => Auth::user()->id, 
                    'id_pelicula' => $id,
                    'texto' => $texto,
                    'fecha' => date("d/m/Y")
                ]
            );
        }
        return Redirect::route("pelicula",[$id]);
    }

    /**
     * Delete a single comment by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Comentario::where('id', $request->input('id'))->delete();
        return Redirect::route("pelicula",[$request->input('pelicula')]);
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
