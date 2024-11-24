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
            $table->unsignedBigInteger('supplier_id');
            $table->foreignId('supplier_id')->references('id')->on('suppliers')
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
            $table->dropColumn('supplier_id');
        });
    }
};