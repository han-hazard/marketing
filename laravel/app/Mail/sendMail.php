<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $Container;
    public function __construct($Container)
    {
        //
        return $this->Container = $Container;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // echo 'ngo ich';
        return $this->subject('ok chưa')->from('trandinhhan30081996@gmail.com')->view('sendMail');
    }
}
