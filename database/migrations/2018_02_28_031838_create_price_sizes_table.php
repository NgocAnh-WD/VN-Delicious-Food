<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->index();
            $table->string('size');
            $table->string('quality');
            $table->decimal('price', 15, 2);
            $table->integer('quantity');
            $table->integer('is_price')->default(0);
            $table->integer('is_delete')->default(0);
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_sizes');
    }
}
