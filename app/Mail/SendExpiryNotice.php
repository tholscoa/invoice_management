<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendExpiryNotice extends Mailable
{
    use Queueable, SerializesModels;
    public $project, $due_days;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($project, $due_days)
    {
        $this->project = $project;
        $this->due_days =$due_days;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Renewal Notice')
                    ->view(['html' =>'email.notify']);
    }
}
