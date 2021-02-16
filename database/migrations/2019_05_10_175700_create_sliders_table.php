<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable();
            $table->longText('body')->nullable();
            $table->string('image');
            $table->bigInteger('order')->default(1);
            $table->boolean('status')->default(1);
            $table->userTrackingFields();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('sliders', function (Blueprint $table) {
            $table->userTrackingForeignKeys();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
