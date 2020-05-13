<?php

namespace Numerus\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public  $email;
    public function __construct(Request $request)
    {
        $this->email=$request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('New Mail')
        ->from('gevorgabgaryan002@gmail.com')
        ->to('gevorg.gak@gmail.com')
        ->view('email.contactmail');
    }
}
