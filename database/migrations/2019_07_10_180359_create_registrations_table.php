<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('code')->nullable();
            $table->text('name');
            $table->longText('data');
            $table->boolean('payment')->default(0);
            $table->boolean('transaction_id')->nullable();
            $table->boolean('approved')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('registrations');
    }
}
