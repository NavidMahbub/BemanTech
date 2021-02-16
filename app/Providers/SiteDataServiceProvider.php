<?php

namespace App\Providers;

use App\Models\ContentPost;
use Illuminate\Support\ServiceProvider;

// models
use App\Models\SettingSeo;
use App\Models\SettingSite;
use App\Models\ItemCategory;
use App\Models\SettingContact;
use App\Models\ContentCategory;

class SiteDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // contact settings
        $this->contact();

        // site settings
        $this->site();

        // seo settings
        $this->seo();
    }

    private function contact()
    {
        $contact = SettingContact::first();

        view()->share('setting_contact', json_decode(json_encode($contact)));
    }

    private function site()
    {
        $site = SettingSite::first();

        view()->share('setting_site', json_decode(json_encode($site)));
    }

    private function seo()
    {
        $seo = SettingSeo::first();

        view()->share('setting_seo', json_decode(json_encode($seo)));
    }
}
