<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use App\User;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    function nombre(Request $request){
        $id = $request->input('id');
        $nombre = $request->input('nombre');
        if(isset($id) && isset($nombre)){
            User::where('id', $id)->update(['name' => $nombre]);
            $resultado = "Nombre modificado";
        }else{
            $resultado = "Introduce un nombre";
        }
        return view("usuario.cuenta.cuenta",compact('resultado'));
    }

    function email(Request $request){
        $id = $request->input('id');
        $email = $request->input('email');
        if(isset($id) && isset($email)){
            User::where('id', $id)->update(['email' => $email]);
            $resultado = "Email modificado";
        }else{
            $resultado = "Introduce un email";
        }
        return view("usuario.cuenta.cuenta",compact('resultado'));
    }

    function password(Request $request){
        $id = $request->input('id');
        $password = $request->input('password');
        if(isset($id) && isset($password)){
            User::where('id', $id)->update(['password' => Hash::make($password)]);
            $resultado = "Password modificada";
        }else{
            $resultado = "Introduce una password";
        }
        return view("usuario.cuenta.cuenta",compact('resultado'));
    }
}
