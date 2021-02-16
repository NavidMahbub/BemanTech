<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsers1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('geo_division_id')->nullable();
            $table->unsignedInteger('geo_district_id')->nullable();
            $table->unsignedInteger('geo_upazila_id')->nullable();
            $table->unsignedInteger('geo_union_id')->nullable();
            $table->unsignedInteger('parent_id')->nullable()->comment('User Id');
            $table->unsignedInteger('code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'geo_division_id',
                'geo_district_id',
                'geo_upazila_id',
                'geo_union_id',
                'parent_id',
                'code',
            ]);
        });
    }
}
