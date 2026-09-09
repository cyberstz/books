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
        Schema::create('book_warehouse', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id')->index();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->unsignedBigInteger('warehouse_id')->index();
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->primary(['book_id', 'warehouse_id']);
            $table->integer('count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_warehouse');
    }
};
