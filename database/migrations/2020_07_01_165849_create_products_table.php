<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('codeno');
            $table->text('photo');
            $table->integer('price');
            $table->integer('discount');
            $table->text('description');
            $table->unsignedBigInteger('seller_id');
            $table->timestamps();
            $table->softDeletes();

             $table->foreign('seller_id')
                  ->references('id')->on('sellers')
                  ->onDelete('cascade');
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