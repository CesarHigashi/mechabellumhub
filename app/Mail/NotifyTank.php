<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Tank;


class NotifyTank extends Mailable
{
    use Queueable, SerializesModels;

    public $tank;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tank $tank)
    {
        $this->tank = $tank;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.notifyTank');
    }
}
