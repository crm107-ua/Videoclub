<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        User::create([
            'rol' => 1,
            'name' => "Admin", 
            'email' => "root@root.es",
            'password' => "$2y$10$5rIJ2CujSFehOWQTfjmAteqfpd3s62CmDOzmi2L98ArCA.QTQ0KPy",  //12345678
            'imagen' => '7.jpg',
            'api_token' => Str::random(60)
        ]);

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'rol' => 2,
                'name' => $faker->name, 
                'email' => $faker->unique()->safeEmail,
                'password' => "$2y$10$5rIJ2CujSFehOWQTfjmAteqfpd3s62CmDOzmi2L98ArCA.QTQ0KPy",  //12345678
                'api_token' => Str::random(60)
            ]);
        }
    }
}
