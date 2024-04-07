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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->foreignId('status_id')->references('id')->on('statuses');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->string('address',1000);
            $table->date('order_date');
            $table->integer('ordered_quantity');
            $table->string('PathPhoto1',400)->nullable();
            $table->string('PathPhoto2',400)->nullable();
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
