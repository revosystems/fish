<?php

namespace App\Thrust;

use BadChoice\Thrust\ChildResource;
use BadChoice\Thrust\Fields\Gravatar;
use BadChoice\Thrust\Fields\HasMany;
use BadChoice\Thrust\Fields\Text;

class Organization extends ChildResource
{
    public static $model          = \App\Models\Organization::class;
    public static $search         = ['name'];
    public static $parentRelation = 'parentOrganization';

    public function fields()
    {
        return [
            Gravatar::make('email', '')->withDefault('https://raw.githubusercontent.com/BadChoice/handesk/master/public/images/default-avatar.png'),
            Text::make('name'),
            HasMany::make('leads', trans_choice('admin.lead', 2))->withLink()->useTitle(),
            HasMany::make('organizations')->withLink(),
            HasMany::make('users')->useTitle(),
        ];
    }

    public function mainActions()
    {
        return [];
    }

    public function actions()
    {
        return [];
    }

    protected function getBaseQuery()
    {
        if (! auth()->user()->admin) {
            return parent::getBaseQuery()->whereTrue(false);
        }
        if (! $this->parentId) {
            return parent::getBaseQuery()->where('id', auth()->user()->organization_id);
        }
        $organization = auth()->user()->organization;
        return parent::getBaseQuery()->whereIn('id', $organization->getChildrenOrganizations()->push($organization)->pluck('id'));
    }
}
