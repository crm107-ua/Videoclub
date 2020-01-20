<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;


class Publicidad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publicidad';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia un texto informativo a todos los usuarios';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function publicidad($address,$texto){
        $mail = new \PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug  = 0;                          
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";                 
        $mail->Host       = "in-v3.mailjet.com";    
        $mail->Port       = 587;                 
        $mail->Username   = "55b8c8f0a5dfc7d358386e3d48a3f135"; 
        $mail->Password   = "3417286fdc2c0abb65e90586b48492ba";     
        $mail->SetFrom('trollers2019@gmail.com', 'Videoclub');
        $mail->Subject = "Videoclub - Wanikoko - Novedades";
        $mail->MsgHTML($texto);
        $mail->AddAddress($address, "Videoclub - Novedades");
        $resul = $mail->Send();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $texto = $this->ask('¿Que texto quieres enviar a todos los uaurios?');
        if(!empty($texto)){
            foreach(User::all() as $usuario){
                $this->publicidad($usuario->email,$texto);
            }
            echo "Todos los emails han sido enviados\n";
        }else{
            echo "No has introducido nada\n";
        }
    }
}
