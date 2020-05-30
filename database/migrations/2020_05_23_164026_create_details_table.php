<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_sales')->nullable()->unsigned();
            $table->foreignId('id_product')->nullable()->unsigned();
            $table->integer('quantity');
            $table->float('subtotal');
            $table->timestamps();
            $table->foreign('id_sales')->references('id')->on('sales')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
