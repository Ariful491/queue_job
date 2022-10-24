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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title',50)->unique();
            //$table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->bigInteger('cat_id')->unsigned()->index();
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->enum('product_type',['standard','variant'])->default('variant');
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
};
