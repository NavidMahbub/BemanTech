<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->form_groups = config('cms.registration.shortForm');
        unset($this->form_groups[3]);
        $form_groups = json_decode(json_encode($this->form_groups));
        view()->share('form_groups', $form_groups);

        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
