<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;

class TasksController extends Controller
{
    public function complete(Task $task){
        $task->complete();
        return back();
    }
}
