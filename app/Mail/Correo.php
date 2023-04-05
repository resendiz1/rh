<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

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
    public function attachments($curriculum): array
    {
        $this->curriculum = $curriculum;
        return [
            Attachment::fromStorage($curriculum)
                        ->as('Curriculum Vitae')
        ];
    }
}
