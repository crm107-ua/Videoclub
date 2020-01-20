<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categorias = array('Terror',
                            'Comedia',
                            'Accion',
                            'Drama',
                            'Animacion');

        foreach($categorias as $tipo) { 
            Categoria::create([
                'nombre' => $tipo
            ]); 
        } 
    }
}
