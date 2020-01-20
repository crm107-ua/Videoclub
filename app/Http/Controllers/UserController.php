<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $table = 'users';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuario.cuenta.cuenta');
    }

    /**
     * Return a single object user
     *
     * @return \Illuminate\Http\Response
     */
    static function getUser($id)
    {
        return User::where('id', $id)->get()->first();
    }


    /**
     * Return a single object user by email
     *
     * @return \Illuminate\Http\Response
     */
    static function getUserByEmail($email)
    {
        return User::where('email', $email)->get()->first();
    }

     /**
     * Reser password by email
     *
     * @return \Illuminate\Http\Response
     */
    static function resetPassword($email,$pass)
    {
        User::where('email', $email)->update(['password' => Hash::make($pass)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.registro.registro');
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
