<?php

namespace App\Http\Controllers;

use App\Mail\Correo;
use Exception;
use App\Models\Dato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class datosController extends Controller
{

    public function post(){
        
        //Moviendo el archivo a la carpeta de laravel para despues mandarlo como adjunto
        $curriculum = request()->file('curriculum')->store('Public');
        
        
        Dato::create([
           'nombre' => request('nombre'),
           'telefono' => request('telefono'),
           'email' => request('email'),
           'edad' =>request('edad'),
           'escolaridad' => request('escolaridad'),
           'curriculum' =>  $curriculum
        ]);

        //Declarando las variables quew nos serviran para darle cuerpo al correo
        $datos['nombre'] = request('nombre');
        $datos['telefono'] = request('telefono');
        $datos['email'] = request('email');
        $datos['edad'] = request('edad');
        $datos['escolaridad'] = request('escolaridad');
        $datos['curriculum'] = $curriculum;


        
        //Configurando las cosas que haran que se mande el correo
        Mail::to('arturo.resendiz@grupopabsa.com')
            ->cc('rh.auxiliar@grupopabsa.com')
            ->bcc('resendiz.galleta@gmail.com')
            ->send(new Correo($datos['nombre'], $datos['telefono'], $datos['email'], $datos['edad'], $datos['escolaridad'], $curriculum));
        

    }
} 



