<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DueTasksMail extends Mailable
{
    use Queueable, SerializesModels;
    private $pendingTasks;

    public function __construct($pendingTasks)
    {
        $this->pendingTasks = $pendingTasks;
    }

    public function build()
    {
        return $this->view('mails.pendingTasks', ['tasks' => $this->pendingTasks]);
    }
}
