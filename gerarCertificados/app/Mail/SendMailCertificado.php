<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailCertificado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $nomePdf;

    public function __construct($nomePdf)
    {
        $this->nomePdf = $nomePdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.index')->from('estudoservidorescloud@gmail.com')->subject('Teste')
                ->attach(\public_path($this->nomePdf));
    }
}
