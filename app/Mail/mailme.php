<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class mailme extends Mailable
{
    public $address;
    public $name;
    public $subject;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      
    }

    public function set_values($nombre,$email,$messagel)
    {
      $name = $nombre;
      $address = $email;
      $subject = 'Mensaje de contacto de '.$nombre;
      $message = $messagel;
      return $this->view('emails.mailme')
            ->from($address, $name)
            ->subject($subject);
    }
}

