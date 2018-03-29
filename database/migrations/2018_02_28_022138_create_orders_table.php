<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->datetime('order_date');
            $table->date('required_date');
            $table->string('note');
            $table->integer('info_customer_id')->unsigned()->index();
            $table->date('shipped_date');
            $table->integer('status');
            $table->integer('is_delete')->default(0);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('info_customer_id')->references('id')->on('info_customers')->onDelete('cascade');
            
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
