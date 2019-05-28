<?php

namespace App\Providers;

use App\Models\Lead;
use App\Models\LeadTypesSegment;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('setActive', function ($routeName) {
            return request()->routeIs($routeName) ? 'current' : '';
        });

        Blade::directive('icon', function ($icon) {
            return icon($icon);
        });

        Blade::directive('iconMaterial', function ($icon) {
            return "<i class='material-icons'>".$icon."</i>";
        });

        Blade::directive('busy', function () {
            return  "<span class='busy'>".\FA::spin('circle-o-notch').'</span>';
        });

        Blade::directive('gravatar', function ($email) {
            return "<?php echo gravatar({$email} ?? null); ?>";
        });

        Blade::directive('segmentClasses', function($type){
            return "<?php echo App\Models\LeadTypesSegment::htmlClasses($type) ?>";
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
