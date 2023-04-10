<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class Correo extends Mailable
{
    use Queueable, SerializesModels;
    
    public $nombre;
    public $telefono;
    public $email;
    public $edad;
    public $escolaridad;
    public $curriculum;


    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $telefono, $email, $edad, $escolaridad, $curriculum)
    {
        $this ->nombre = $nombre;
        $this ->telefono = $telefono;
        $this ->email = $email;
        $this ->edad = $edad;
        $this ->escolaridad = $escolaridad;
        $this ->curriculum = $curriculum;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Postulación de empleo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email',
           
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {


        //Esta linea la puse por que no sabia como mandar a llamar la URL generada por el STORAGE y pos lo hice con una consulta directa a la BD 
        $curriculum = DB::select("SELECT*FROM datos ORDER BY created_at DESC LIMIT 1");
          



        return [
            Attachment::fromStorage(strval($curriculum[0]->curriculum))
                        ->as('Curriculum Vitae')
                   
                    
        ];
    }
}
