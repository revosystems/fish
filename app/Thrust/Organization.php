<?php

namespace App\Thrust;

use BadChoice\Thrust\Fields\Gravatar;
use BadChoice\Thrust\Fields\HasMany;
use BadChoice\Thrust\Fields\Text;
use BadChoice\Thrust\Resource;

class Organization extends Resource
{
    public static $model = \App\Organization::class;
    public static $search = ['name'];

    public function fields()
    {
        return [
            Gravatar::make('email', '')->withDefault('https://raw.githubusercontent.com/BadChoice/handesk/master/public/images/default-avatar.png'),
            Text::make('name'),
            HasMany::make('organizations'),
            HasMany::make('users'),
            HasMany::make('leads'),

        ];
    }


}