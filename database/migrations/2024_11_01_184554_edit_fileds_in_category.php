<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Category', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->TEXT('iamge_path')->nullable()->change();
            $table->TEXT('slug')->nullable()->change();
            $table->integer('parent_id')->nullable()->change();
            $table->integer('sort')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Category', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
            $table->string('iamge_path')->nullable(false)->change();
            $table->string('slug')->nullable(false)->change();
            $table->integer('sort')->nullable(false)->change();
        });
    }
};
