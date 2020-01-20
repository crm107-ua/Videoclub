<?php

namespace App\Http\Controllers;

Use App\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store(Request $request)
    {
        return User::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->update($request->all());

        return response()->json($usuario, 200);
    }

    public function delete(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return 204;
    }

}
