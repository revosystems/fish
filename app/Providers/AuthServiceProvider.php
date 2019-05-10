<?php

namespace App\Providers;

use App\Models\Lead;
use App\Models\Organization;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('see-lead', function ($user, Lead $lead) {
            return $lead->getParentOrganizations()->contains($user->organization);
        });
//        Gate::define('see-organization', function ($user, Organization $organization) {
//            return $organization->getParentOrganizations()->contains($user->organization);
//        });
    }
}
