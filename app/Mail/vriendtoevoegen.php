<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class VriendToevoegen extends Mailable
{
    use Queueable, SerializesModels;
    protected $gebruiker_id;
    protected $vriend_id;
    protected $gebr_naam;
    protected $vriend_naam;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($gebruiker_id, $vriend_id, $gebr_naam, $vriend_naam)
    {
        $this->gebruiker_id = $gebruiker_id;
        $this->vriend_id = $vriend_id;
        $this->gebr_naam = $gebr_naam;
        $this->vriend_naam = $vriend_naam;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('vriendtoevoegenmail', [
            'gebruiker_id' => $this->gebruiker_id, 
            'vriend_id' => $this->vriend_id,
            'gebr_naam' => $this->gebr_naam,
            'vriend_naam' => $this->vriend_naam
        ]);
                
                
    }
}
