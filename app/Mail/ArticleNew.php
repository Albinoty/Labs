<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class ArticleNew extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $id;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request,$id)
    {
        $this->email = $request;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.ArticleNew',compact($this->id));
    }
}
