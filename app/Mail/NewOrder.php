<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;
   // per avere un oggetto in cui memorizzeremo tutte le informazioni dell'ordine che ci ha inviato l'utente
    // essendo public sarà disponibile da tutti i file Laravel
    public $lead;


    /**
     * Create a new message instance.
     */
    public function __construct($lead)
    {
      // "riempiamo" la nostra variabile d'istanza con il parametro che passeremo quando creiamo un nuovo ordine
      $this->lead = $lead;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: $this->lead->customer_address,
            subject: 'New Order',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            //lo mando alla vista degli ordini nella cartella "orders" che ho creato io
            view: 'emails.new-order',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
