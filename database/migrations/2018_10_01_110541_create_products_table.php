<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');            
            $table->longText('description');            
            $table->float('price');           
            $table->float('price_sale');           
            $table->string('image');            
            $table->string('size');            
            $table->string('color');            
            $table->integer('publication_status');
            $table->unsignedInteger('id_brand');
            $table->foreign('id_brand')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
