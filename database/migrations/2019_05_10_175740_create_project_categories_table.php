<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('slug');
            $table->boolean('status')->default(1);
            $table->userTrackingFields();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('project_categories', function (Blueprint $table) {
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
        Schema::dropIfExists('blog_categories');
    }
}
