<?php

namespace App\Console\Commands;

use App\Jobs\SendPendingTasksEmails;
use Illuminate\Console\Command;

class SendDailyPendingTasks extends Command
{
    protected $signature = 'overview:sendDailyPendingTasks';
    protected $description = 'Command description';

    public function handle()
    {
        dispatch(new SendPendingTasksEmails());
    }
}
