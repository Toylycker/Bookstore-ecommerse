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
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->unsignedBigInteger('brand_id')->index()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->nullOnDelete();
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('body')->nullable();
            $table->unsignedFloat('price')->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('discount_percent')->default(0);
            $table->date('discount_date_start')->useCurrent();
            $table->date('discount_date_end')->useCurrent();
            $table->unsignedInteger('sold')->default(0);
            $table->unsignedInteger('viewed')->default(0);
            $table->unsignedInteger('favorited')->default(0);
            $table->unsignedInteger('searched')->default(0);
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
