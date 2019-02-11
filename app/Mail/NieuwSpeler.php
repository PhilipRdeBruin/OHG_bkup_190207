<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NieuwSpeler extends Mailable
{
    use Queueable, SerializesModels;
    private $nieuwspeler;
    private $speler_uitnodiger;
    private $nieuwspeler_naam;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nieuwspeler, $speler_uitnodiger, $nieuwspeler_naam)
    {
        $this->nieuwspeler = $nieuwspeler;
        $this->speler_uitnodiger = $speler_uitnodiger;
        $this->nieuwspeler_naam = $nieuwspeler_naam;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
                
    {
          return $this->view('nieuwspeleruitnodigen', [
              'nieuwspeler' => $this->nieuwspeler,
              'speler_uitnodiger' => $this->speler_uitnodiger,
              'nieuwspeler_naam' => $this->nieuwspeler_naam
          ]);
    }
}


   