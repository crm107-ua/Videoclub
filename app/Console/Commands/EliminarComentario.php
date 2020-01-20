<?php

namespace App\Console\Commands;

use App\Comentario;
use Illuminate\Console\Command;

class EliminarComentario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eliminar:comentario';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elimina un comentario en concreto mediante ID';

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
        if(Comentario::where('id', $this->ask('ID del comentario a eliminar'))->delete()){
            echo "Comentario eliminado correctamente\n";
        }else{
            echo "No se ha encontrado un comentario asociado a esa ID\n";
        }
    }
}
