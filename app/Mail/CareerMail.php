<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
class CareerMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $input;
    public $sendfile;
    public function __construct(Request $request, $sendfile)
    {
        $this->input = $request->all();
        $this->sendfile  = $sendfile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->input['name'];
        $email = $this->input['email'];
        $cv = $this->input['cv'];
        $file = $this->sendfile;
      
        return $this->from($this->input['email'])
        
        ->view('email', compact('email', 'name','file'));
    }
}
