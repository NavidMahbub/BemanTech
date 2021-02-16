<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('slug');
            $table->longText('body')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('order')->default(1);
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('content_category_id');
            $table->userTrackingFields();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('content_posts', function (Blueprint $table) {
            $table->userTrackingForeignKeys();
            $table->foreign('content_category_id')->references('id')->on('content_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contentns');
    }
}
