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
        Schema::table('UsersGoods',function(Blueprint $table){
            //$table->increments('id')->change();
            $table->integer('quantity');
            $table->string('name')->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('UsersGoods',function(Blueprint $table)
        {
           // $table->integer('name')->change();
            $table->dropColumn('quantity');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
};
