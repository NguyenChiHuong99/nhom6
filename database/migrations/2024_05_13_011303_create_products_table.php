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
        // Schema::create('products', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('img')->nullable();
        //     $table->text('description')->nullable();
        //     $table->decimal('price',10,2)->default(0);
        //     $table->unsignedBigInteger('quantity')->default(0);
        //     $table->unsignedBigInteger('sold')->default(0);
        //     $table->unsignedBigInteger('view')->default(0);
        //     $table->unsignedInteger('categories_id');
        //     $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        //     $table->string('trending')->default(0);
        //     $table->string('sellers')->default(0);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
