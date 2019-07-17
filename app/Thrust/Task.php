<?php

namespace App\Thrust;

use BadChoice\Thrust\ChildResource;
use BadChoice\Thrust\Fields\Date;
use BadChoice\Thrust\Fields\Link;
use BadChoice\Thrust\Fields\Text;
use BadChoice\Thrust\Fields\TextArea;

class Task extends ChildResource
{
    public static $model = \App\Models\Task::class;
    public static $parentRelation = 'lead';

    public function fields()
    {
        return [
            Text::make('task'),
            TextArea::make('description'),
            Date::make('date')->showInTimeAgo(),
            Date::make('completed_at'),
            Link::make('id')->route('tasks.complete')->displayCallback(function($task){
                if ($task->completed_at) return "";
                return "Complete";
            }),
            Text::make('id')->displayWith(function($task){
                if ($task->isDue()) return icon('exclamation-triangle');
                return "";
            }),
        ];
    }

    public function create($data)
    {
        return parent::create(array_merge($data, ["user_id" => auth()->id() ]));
    }

    protected function getBaseQuery()
    {
        $query = parent::getBaseQuery()->where('user_id', auth()->id());
        if (! request('all')) {
            $query->incomplete();
        }
        return $query;
    }


}