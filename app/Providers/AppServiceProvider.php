<?php

namespace App\Providers;

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
        Blade::directive('icon', function ($icon) {
            return icon($icon);
        });

        Blade::directive('busy', function () {
            return  "<span class='busy'>".\FA::spin('circle-o-notch').'</span>';
        });

        Blade::directive('gravatar', function ($email) {
            return "<?php echo gravatar({$email} ?? null); ?>";
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
