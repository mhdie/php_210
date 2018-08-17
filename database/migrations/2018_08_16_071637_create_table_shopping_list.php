<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShoppingList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_list', function (Blueprint $table){
            $table->increments('id');
            $table->string('product_id');
            $table->integer('client_id');
            $table->dateTime('date');
            $table->dateTime('payment_date');
            $table->enum('payment_status',['paid','not_paid'])->default('not_paid');
            $table->char('total_price');
            $table->char('call_back_payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_list');
    }
}
