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
        Schema::create('categories_product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('status');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('images')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('categories_product')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_product');
    }
};
