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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->onDelete('cascade');
           // $table->bigInteger('product_id')->unsigned()->index();
//            $table->foreign('product_id')->references('id')->on('products');
            $table->string('name',80)->nullable();
            $table->string('value',80)->nullable();
            $table->string('sku',150);
            $table->integer('barcode');
            $table->double('price',8,2);
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
        Schema::dropIfExists('product_variants');
    }
};
