<?php

namespace App\Thrust;

use App\ThrustHelpers\Fields\Status;
use BadChoice\Thrust\Fields\BelongsTo;
use BadChoice\Thrust\Fields\Date;
use BadChoice\Thrust\Fields\Email;
use BadChoice\Thrust\Fields\Gravatar;
use BadChoice\Thrust\Fields\HasMany;
use BadChoice\Thrust\Fields\Text;
use BadChoice\Thrust\Resource;

class Lead extends Resource
{
    public static $model = \App\Models\Lead::class;
    public static $search = ['name', 'email', /*'company',*/ 'phone'];

    public function fields()
    {
        return [
            Gravatar::make('email', '')->withDefault('https://raw.githubusercontent.com/BadChoice/handesk/master/public/images/default-avatar.png'),
            Text::make('id'),
            Text::make('name'),
            /*Link::make('id', __('lead.company'))->link('/leads/{field}')->displayCallback(function ($lead) {
                return $lead->company;
            }),
            Link::make('id', __('lead.name'))->link('/leads/{field}')->displayCallback(function ($lead) {
                return $lead->name;
            }),*/
            Email::make('email')->sortable(),
            HasMany::make('tags'),
            BelongsTo::make('organization'),
            BelongsTo::make('user'),
            Status::make('status')->sortable(),
//            Tasks::make('tasks', trans_choice('lead.task', 2)),
            Date::make('created_at', __('admin.requested'))->showInTimeAgo()->sortable(),
            Date::make('updated_at', __('admin.updated'))->showInTimeAgo()->sortable(),
        ];
    }
}