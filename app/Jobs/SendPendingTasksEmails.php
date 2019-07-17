<?php

namespace App\Jobs;

use App\Mail\DueTasksMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendPendingTasksEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {

    }

    public function handle()
    {
        User::whereHas('tasks')->each(function($user){
           $this->sendPendingTasksEmail($user);
        });
    }

    private function sendPendingTasksEmail($user)
    {
        $pendingTasks = $user->tasks()->due();
        if ($pendingTasks->count() > 0)
            Mail::to($user)->send(new DueTasksMail($pendingTasks->get()));
    }
}
