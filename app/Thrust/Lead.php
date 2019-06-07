<?php

namespace App\Thrust;

use App\ThrustHelpers\Fields\Status;
use App\ThrustHelpers\Filters\LeadStatusFilter;
use BadChoice\Thrust\ChildResource;
use BadChoice\Thrust\Fields\BelongsTo;
use BadChoice\Thrust\Fields\Date;
use BadChoice\Thrust\Fields\Email;
use BadChoice\Thrust\Fields\Gravatar;
use BadChoice\Thrust\Fields\HasMany;
use BadChoice\Thrust\Fields\Link;
use BadChoice\Thrust\Fields\Text;

class Lead extends ChildResource
{
    public static $model          = \App\Models\Lead::class;
    public static $search         = ['name', 'email', 'trade_name', 'phone', 'surname1'];
    public static $parentRelation = 'organization';
    public static $defaultSort    = 'updated_at';
    public static $defaultOrder   = 'DESC';

    public function fields()
    {
        return [
            Gravatar::make('email', '')->withDefault('https://raw.githubusercontent.com/BadChoice/handesk/master/public/images/default-avatar.png'),
            Text::make('id')->sortable(),
            Link::make('id', __('admin.name'))->route('leads.show')->displayCallback(function ($lead) {
                return $lead->name;
            })->sortable(),
            Email::make('email')->sortable(),
            HasMany::make('tags'),
            BelongsTo::make('organization'),
            BelongsTo::make('user'),
            Status::make('status')->sortable(),
            Date::make('created_at', __('admin.requested'))->showInTimeAgo()->sortable(),
            Date::make('updated_at', __('admin.updated'))->showInTimeAgo()->sortable(),
        ];
    }

    public function canDelete($object)
    {
        return false;
    }

    public function actions()
    {
        return [];
    }

    public function filters()
    {
        return [
            new LeadStatusFilter
        ];
    }

    protected function getBaseQuery()
    {
        if (! auth()->user()->admin) {
            return auth()->user()->leads();
//            parent::getBaseQuery();
        }
        $organization = auth()->user()->organization;
        return parent::getBaseQuery()->whereIn('organization_id', $organization->getChildrenOrganizations()->push($organization)->pluck('id'));
    }
}
