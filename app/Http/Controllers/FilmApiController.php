<?php

namespace App\Http\Controllers;

Use App\Pelicula;
use Illuminate\Http\Request;

class FilmApiController extends Controller
{
    public function index()
    {
        return Pelicula::all();
    }

    public function show($id)
    {
        return Pelicula::find($id);
    }

    public function store(Request $request)
    {
        return Pelicula::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->update($request->all());

        return response()->json($pelicula, 200);
    }

    public function delete(Request $request, $id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->delete();

        return 204;
    }

}
