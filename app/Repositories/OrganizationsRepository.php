<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Models\Organization;
use Carbon\Carbon;

class OrganizationsRepository
{
    public static function all()
    {
        if (auth()->user()->admin) {
            return Organization::whereNull('organization_id');
        }
        $organization = Organization::findOrFail(auth()->user()->organization_id);
        return Organization::whereIn('id', $organization->getChildrenOrganizations()->push($organization)->pluck('id'));
    }
}
