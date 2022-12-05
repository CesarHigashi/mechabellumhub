<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Plane;


class NotifyPlane extends Mailable
{
    use Queueable, SerializesModels;

    public $plane;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Plane $plane)
    {
        $this->plane = $plane;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.notifyPlane');
    }
}
