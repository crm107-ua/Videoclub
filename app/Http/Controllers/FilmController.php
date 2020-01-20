<?php

namespace App\Http\Controllers;

use DB;
use Exception;
use Redirect;
use App\Pelicula;
use App\Comentario;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pelicula = $this->checkFilm($id);
        if($pelicula){
            return view('pelicula.pelicula.pelicula', compact('pelicula'));
        }else{
            abort(403, 'Pelicula no encontrada');
        }
    }

    /**
     * Comprueba existencia.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkFilm($id)
    {
        if(Pelicula::where('id', $id)->count() > 0){
            return Pelicula::where('id', $id)->get()->first();
        }else{
            return null;
        }
    }

    /**
     * Return a object film
     *
     * @return \Illuminate\Http\Response
     */
    static function getFilm($id)
    {
        return Pelicula::where('id', $id)->get()->first();
    }

    /**
     * Return last films
     *
     * @return \Illuminate\Http\Response
     */
    static function getLastFilms()
    {
        return Pelicula::orderByRaw('id DESC')->limit(3)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $titulo = htmlspecialchars(trim($request->input('titulo')));
        $descripcion = htmlspecialchars(trim($request->input('descripcion')));
        $categoria = htmlspecialchars(trim($request->input('categoria')));
        $posicion = htmlspecialchars(trim($request->input('posicion')));
        $trailer = htmlspecialchars(trim($request->input('trailer')));

        try {
            if (empty($titulo)){throw new Exception('Titulo vacio');}
            if (empty($descripcion)){throw new Exception('Descripcion vacia');}
            if (strlen($descripcion) < 6){throw new Exception('Descripcion minima de 20 caracteres');}
        } catch (\Exception $e) {
            $error = ($e->getMessage());
        }
        if(!$this->vaidateImg()){
            $error = "La imagen no es apta";
        }
        if (!isset($error)) {
            Pelicula::insert(
                [
                    'titulo' => $titulo, 
                    'descripcion' => $descripcion,
                    'fecha' => date("d/m/Y"),
                    'cat_id' => $categoria,
                    'imagen' => $_FILES["fileToUpload"]["name"],
                    'posicion' => $posicion,
                    'trailer' => $trailer
                ]
            );
            $error = "Pelicula registrada correctamente";
        }
        return view("pelicula.pelicula.agregarPelicula",compact('error'));
    }

    /**
     * Delete a single film by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Pelicula::where('id', $request->input('id'))->delete();
        Comentario::where('id_pelicula', $request->input('id'))->delete();
        return Redirect::route("home");
    }

    /**
     * Edit a single film by request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $titulo = htmlspecialchars(trim($request->input('titulo')));
        $descripcion = htmlspecialchars(trim($request->input('descripcion')));
        $categoria = htmlspecialchars(trim($request->input('categoria')));
        $posicion = htmlspecialchars(trim($request->input('posicion')));
        $trailer = htmlspecialchars(trim($request->input('trailer')));

        try {
            if (empty($titulo)){throw new Exception('Titulo vacio');}
            if (empty($descripcion)){throw new Exception('Descripcion vacia');}
            if (strlen($descripcion) < 6){throw new Exception('Descripcion minima de 20 caracteres');}
        } catch (\Exception $e) {
            $error = ($e->getMessage());
        }

        if (!isset($error)) {
            Pelicula::where('id', $request->input('id'))->update(
                [
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'cat_id' => $categoria,
                    'posicion' => $posicion,   
                    'trailer' => $trailer 
            ]);
            $films = Pelicula::all();
            return view('usuario.admin.administracion', compact('films'));  
        }else{
            $pelicula = $this->getFilm($request->input('id'));
            return view("pelicula.pelicula.editarPelicula",compact('pelicula','error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = $this->getFilm($id);
        return view("pelicula.pelicula.editarPelicula",compact('pelicula'));
    }


    /**
     * Display trailers.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trailers(){
        return view('pelicula.trailers.trailers');
    }

    /**
     * Display film creator.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addFilmForm(){
        return view('pelicula.pelicula.agregarPelicula');
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

    

    protected function vaidateImg(){
        $target_dir = "images/peliculas/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
        if (empty($_FILES["fileToUpload"]["tmp_name"])) {
            $uploadOk = 0;
        }else{
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
    
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
    
        if ($uploadOk == 1) {
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            return true;
        }else{
            return false;
        }
    }
}
