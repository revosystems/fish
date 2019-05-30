<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Models\Status;
use Carbon\Carbon;

class LeadsRepository
{
    public static function assignedToMe()
    {
        return auth()->user()->leads()->where('status', '<', Status::COMPLETED);
    }

    public static function unassigned()
    {
        if (auth()->user()->admin) {
            return Lead::whereNull('user_id')->where('status', '<', Status::COMPLETED);
        }

        return auth()->user()->teamsLeads()->whereRaw('tickets.user_id is NULL')->where('status', '<', Status::COMPLETED);
    }

    public static function all()
    {
        if (auth()->user()->admin || ! auth()->user()->organization_id) {
            return Lead::where('status', '<', Status::COMPLETED);
        }
        $organization = \App\Models\Organization::find(auth()->user()->organization_id);
        // return auth()->user()->teamsLeads()->where('status', '<', Status::COMPLETED);
        return Lead::where('status', '<', Status::COMPLETED)->whereIn('organization_id', $organization->getChildrenOrganizations()->push($organization)->pluck('id'));
    }

    public static function recentlyUpdated()
    {
        return static::all()->whereRaw("leads.updated_at > '".Carbon::parse('-1 days')->toDateTimeString()."'");
    }

    public static function completed()
    {
        if (auth()->user()->admin) {
            return Lead::where('status', '=', Status::COMPLETED);
        }

        return auth()->user()->teamsLeads()->where('status', '=', Status::COMPLETED);
    }

    public static function failed()
    {
        if (auth()->user()->admin) {
            return Lead::where('status', '=', Status::FAILED);
        }

        return auth()->user()->teamsLeads()->where('status', '=', Status::FAILED);
    }

    public static function search($text)
    {
        if (auth()->user()->admin) {
            $leadsQuery = Lead::query();
        } else {
            $leadsQuery = auth()->user()->teamsLeads();
        }

        return $leadsQuery->where(function ($query) use ($text) {
            $query->where('name', 'like', "%{$text}%")
                        ->orWhere('email', 'like', "%{$text}%")
                        ->orWhere('company', 'like', "%{$text}%")
                        ->orWhere('city', 'like', "%{$text}%")
                        ->orWhere('country', 'like', "%{$text}%")
                        ->orWhere('phone', 'like', "%{$text}%");
        });
        /*->distinct()*/
    }
}
