<?php

namespace App\Providers;

use App\Models\SettingSeo;
use App\Models\SettingSite;
use Illuminate\Support\ServiceProvider;
use Artesaos\SEOTools\Facades\SEOTools;

class PkcsbdSeoServiceProvider extends ServiceProvider
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
        $seo = SettingSeo::first();
        $site = SettingSite::first();
        SEOTools::setTitle($seo->title, 'Talent Sports Limited');
        SEOTools::setDescription($seo->description);
        SEOTools::opengraph()->setUrl(url('/'));
        SEOTools::opengraph()->addImage($seo->image ?: $site->logo);
        SEOTools::setCanonical(url('/'));
        SEOTools::opengraph()->addProperty('type', 'WebPage');
        SEOTools::twitter()->setSite('@pkcsbd');
        SEOTools::jsonLd()->addImage($site->logo);
    }
}
