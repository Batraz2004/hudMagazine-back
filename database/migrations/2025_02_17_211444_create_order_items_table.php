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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('userGoods_id')->constrained('usersGoods');
            $table->string('name',100);
            $table->decimal('cost',10, 2)->default(0)->unsigned();
            $table->integer('quantity');
            //метод onDelete чтобы заиси удалились при удаленнии : родителей из лавки или заказа
            //$table->foreignId('goodsId')->constrained('goods')->cascadeOnDelete();
            //$table->foreignId('orderId')->constrained('Orders')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();//= unsignedBigInter
            //так как у род таблиц goods и orers id типа int а не unsignedBigInter:

            $table->integer('goodsId');
            $table->integer('orderId');

            $table->foreign('goodsId')
                ->references('id')
                ->on('goods')
                ->onDelete('cascade');

            $table->foreign('orderId')
                ->references('id')
                ->on('Orders')
                ->onDelete('cascade');
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
        Schema::dropIfExists('order_items');
    }
};
