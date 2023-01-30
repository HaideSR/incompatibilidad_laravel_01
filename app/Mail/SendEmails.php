<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class SendEmails extends Mailable{
   public $data;
   public function __construct($data){
      $this->data = $data;
   }

   public function build()   {
      return $this->view('emails.restablecer-password');
   }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope() {
         $subject = $this->data['subject'];
         $subject = $subject ? $subject : 'Información Fiscalia general del Estado';
        return new Envelope(
            from: new Address( env('MAIL_FROM_ADDRESS'), 'Fiscalia general del Estado'),
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
   //  public function content()
   //  {
   //      return new Content(
   //          view: 'view.name',
   //      );
   //  }

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
