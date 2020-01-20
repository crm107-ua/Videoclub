<?php

namespace App\Console\Commands;

use App\Categoria;
use Illuminate\Console\Command;

class CrearCategoria extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crear:categoria';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una categoria';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $nombre = $this->ask('Nombre de la nueva categoria');
        if(!empty($nombre) && Categoria::insert(['nombre' => $nombre])){
            echo "Categoria creada correctamente\n";
        }else{
            echo "No has introducido nada\n";
        }
    }
}
