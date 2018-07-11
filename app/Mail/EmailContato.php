<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailContato extends Mailable
{
    use Queueable, SerializesModels;

    public $arrayContato;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $contato)
    {
        $this->arrayContato = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to('contato@coletivoboitata.com.br')
            ->subject($this->arrayContato['title']."## <- contato pelo site do BOI!")
            ->view('emails.contato')
            ->with('contato', $this->arrayContato);
    }
}
