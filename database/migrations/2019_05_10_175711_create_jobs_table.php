<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->text('slug');
            $table->longText('description')->nullable();
            $table->text('vacancy')->nullable();
            $table->text('salary')->nullable();
            $table->text('company_name');
            $table->text('country');
            $table->text('person_name');
            $table->text('email');
            $table->text('designation')->nullable();
            $table->text('attachment')->nullable();
            $table->text('expiry_date')->nullable();
            $table->boolean('type')->default(0)->comment('0 - Job, 1 - Job Registration');
            $table->boolean('status')->default(1);
            $table->userTrackingFields();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('jobs', function (Blueprint $table) {
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
        Schema::dropIfExists('jobs');
    }
}
