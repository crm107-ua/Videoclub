<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contacto(Request $request)
    {
        $name = htmlspecialchars(trim($request->input('name')));
        $email = htmlspecialchars(trim($request->input('email')));
        $texto = htmlspecialchars(trim($request->input('texto')));
        try {
            if (empty($email)){throw new Exception('Email vacio');}
            if (empty($name)){throw new Exception('Nombre vacio');}
            if (empty($texto)){throw new Exception('Texto vacio');}
            if (strlen($texto) < 6){throw new Exception('Longitud minima de texto 10 carácteres');}
        } catch (\Exception $e) {
            $error = ($e->getMessage());
        }
        if (!isset($error)) {
            $this->send($email,$name,$texto);
            $error = "Mensaje enviado correctamente";
        }
        return view("general.Contacto.contact",compact('error'));
    }

    public function remember(Request $request)
    {
        $email = htmlspecialchars(trim($request->input('email')));
        try {
            if (empty($email)){throw new Exception('Email vacio');}
        } catch (\Exception $e) {
            $error = ($e->getMessage());
        }
        if(!UserController::getUserByEmail($email)){
            $error = "El usuario no existe";
        }
        if (!isset($error)) {
            $this->send($email);
            $error = "Revisa tu correo electronico";
        }
        return view("usuario.remember.remember",compact('error'));
    }

    public function send($email,$name=null,$texto=null)
    {
        $mail = new \PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP();
        // cambiar a 0 para no ver mensajes de error
        $mail->SMTPDebug  = 0;                          
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";                 
        $mail->Host       = "in-v3.mailjet.com";    
        $mail->Port       = 587;                 
        $mail->Username   = "55b8c8f0a5dfc7d358386e3d48a3f135"; 
        $mail->Password   = "3417286fdc2c0abb65e90586b48492ba";     
        $mail->SetFrom('trollers2019@gmail.com', 'Videoclub');

        if(!$texto){
            $address = $email;
            $pass = rand(1000, 10000);
            UserController::resetPassword($email,$pass);
            $mail->Subject = "Hola! Hemos restablecido tu password";
            $mail->MsgHTML("Esta va a ser tu nueva contraseña: ".$pass);
        }else{
            $address = 'trollers2019@gmail.com';
            $mail->Subject = "Mensaje de contacto";
            $mail->MsgHTML("Mensaje recibido de:".$name.", email:".$email.", texto:".$texto);
        }

        $mail->AddAddress($address, "Videoclub");
        $resul = $mail->Send();
    }
}
