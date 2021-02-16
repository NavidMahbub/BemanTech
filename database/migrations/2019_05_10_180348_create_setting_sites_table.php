<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo')->nullable();
            $table->string('license_no')->nullable();
            $table->string('registration_no')->nullable();
            $table->text('copyright_text')->nullable();
            $table->string('brochure')->nullable();
            $table->longText('twitter_feed')->nullable();
            $table->longText('facebook_likebox')->nullable();
            $table->userTrackingFields();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_sites');
    }
}
