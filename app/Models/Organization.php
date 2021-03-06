<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $guarded = [];
    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function parentOrganization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function leadsWith()
    {
        return $this->hasManyThrough(Lead::class, Organization::class);
    }

    public function getParentOrganizations($organizations = [])
    {
        return $this->organization_id ? $this->parentOrganization->getParentOrganizations($organizations)->push($this->parentOrganization) : collect($organizations);
    }

    public function getChildrenOrganizations()
    {
        $organizationsArray = $this->organizations;
        return $organizationsArray->each(function ($organization) use ($organizationsArray) {
            $organizationsArray->push($organization->getChildrenOrganizations()->flatten());
        })->flatten();
    }
}
