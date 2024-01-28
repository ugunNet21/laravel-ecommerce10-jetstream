<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('product_code');
            $table->decimal('discount', 8, 2)->default(0);
            $table->decimal('tax', 8, 2)->default(0);
            $table->boolean('favorite')->default(false);
            $table->text('short_description');
            $table->text('long_description');
            $table->decimal('selling_price', 10, 2);
            $table->decimal('purchase_price', 10, 2);
            $table->integer('stock');
            $table->string('image')->nullable();
            $table->timestamps();

        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')->on('categories_product')
                ->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }

};
