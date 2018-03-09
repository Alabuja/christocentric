<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubmitSongMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sendItems;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sendItems)
    {
        $this->sendItems = $sendItems;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.submission')
                    ->with('sendItems', $this->sendItems);
    }
}
