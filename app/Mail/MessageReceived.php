<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The message is a mailer property , jai du changer
     *
     * @var \App\Models\Message
     */
    public $arrMsg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        //le camelcase cest mieux pour les attributs de models ducoup je compense en cast
        $this->arrMsg = $message->toArray();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Nouveau message reçu')->from('dorian.saez13@gmail.fr')
            ->view('mail.message_received');
    }
}
