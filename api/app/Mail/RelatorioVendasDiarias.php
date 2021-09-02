<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RelatorioVendasDiarias extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The vendedor instance.
     *
     * @var Array
     */
    public $vendedores;

    /**
     * Create a new message instance.
     *
     * @param  Array  $vendedores
     * @return void
     */
    public function __construct($vendedores)
    {
        $this->vendedores = $vendedores;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.relatorio_diario');
    }
}