<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyTestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $total;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $total)
    {
        $this->data = $data;
        $this->total = $total;
    }

    public function build()
    {
        return $this->subject('Mr. Paul Bekare')->view('email.email-view')->with(['data' => $this->data, 'total' => $this->total]);
    }
}
