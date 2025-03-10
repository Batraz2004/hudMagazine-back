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
        Schema::table('Orders', function (Blueprint $table) {
            $table->dropColumn('goodsId');
            $table->dropColumn('cost');
            $table->dropColumn('userGoods_id');
            $table->dropColumn('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Orders', function (Blueprint $table) {
            $table->foreignId('goodsId');
            $table->unsignedDecimal('cost');
            $table->foreignId('userGoods_id');
            $table->string('title');
        });
    }
};
