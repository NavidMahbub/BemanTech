<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('slug');
            $table->longText('body')->nullable();
            $table->text('image')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('blog_category_id');
            $table->userTrackingFields();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('blog_posts', function (Blueprint $table) {
            $table->userTrackingForeignKeys();
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
