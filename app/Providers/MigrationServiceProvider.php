<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class MigrationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);

        // tracking fields
        Blueprint::macro('userTrackingFields', function ($softDeletes = true) {
            $this->unsignedBigInteger('created_by')->nullable();
            $this->unsignedBigInteger('updated_by')->nullable();
            $this->unsignedBigInteger('deleted_by')->nullable();
        });

        // tracking foreign keys
        Blueprint::macro('userTrackingForeignKeys', function ($softDeletes = true) {
            $this->foreign('created_by')->references('id')->on('users');
            $this->foreign('updated_by')->references('id')->on('users');
            $this->foreign('deleted_by')->references('id')->on('users');
        });
    }
}
