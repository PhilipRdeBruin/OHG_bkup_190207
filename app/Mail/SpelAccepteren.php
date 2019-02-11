<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SpelAccepteren extends Mailable
{
    use Queueable, SerializesModels;

    protected $actiefSpel;
    protected $speler;
    protected $actSpelUser;
    
    
    /**
    * Create a new message instance.
    *
    * @return void
    */
    public function __construct($actiefSpel, $speler, $actSpelUser)
    {   
        $this->actiefSpel = $actiefSpel;
        $this->speler = $speler;
        $this->actSpelUser = $actSpelUser;
    }

    /**
    * Build the message.
    *
    * @return $this
    */
    public function build()
    {
        return $this->view('spelaccepterenmail', [
            'actiefSpel' => $this->actiefSpel,
            'speler' => $this->speler,
            'pivotId' => $this->actSpelUser->id,
            'hostGebr' => $this->actiefSpel->hostGebruiker,
            'spelnaam' => $this->actiefSpel->spelletje->spel_naam
        ]);
    }
}
