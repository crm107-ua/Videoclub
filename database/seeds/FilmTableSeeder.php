<?php

use App\Pelicula;
use Illuminate\Database\Seeder;

class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 3; $i++) {
            Pelicula::create([
                'titulo' => $faker->name, 
                'descripcion' => $faker->name, 
                'fecha' => now(),
                'cat_id' => random_int(1,5),
                'imagen' => 'ope.jpg',
                'posicion' => 'banner'
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Pelicula::create([
                'titulo' => $faker->name, 
                'descripcion' => $faker->name, 
                'fecha' => now(),
                'cat_id' => random_int(1,5),
                'imagen' => 'ope.jpg',
                'posicion' => 'general'
            ]);
        }
    }
}
