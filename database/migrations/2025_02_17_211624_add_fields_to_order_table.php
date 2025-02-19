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
            $table->string('e-mail');
            $table->string('address');
            $table->string('phone');
            $table->string('comment')->nullable();
            $table->unsignedDecimal('total_price')->default(0);

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
            $table->dropColumn('e-mail');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('comment');
            $table->dropColumn('total_price');

        });
    }
};
