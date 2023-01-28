<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Intervalo;

class ReservaMailController extends Mailable
{
    use Queueable, SerializesModels;

    public $intervalo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Intervalo $intervalo)
    {
        $this->intervalo=$intervalo;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Comunicación Cobra Pádel',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $intervalo = User::where('email','miguel@mail.com')->firstOrFail()->intervalos();
        return new Content(
            view: 'mails.reserva',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
