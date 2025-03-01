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
        Schema::table('usersGoods', function (Blueprint $table) {
            $table->decimal('price',10, 2)->default(0)->unsigned();
            $table->decimal('total_price',10, 2)->default(0)->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usersGoods', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('total_price');

        });
    }
};
