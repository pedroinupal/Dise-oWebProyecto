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
            $table->foreignId('status_id')->default(1)->references('id')->on('statuses');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->string('address',1000);
            $table->date('order_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('ordered_quantity');
            $table->string('PathPhoto1',400)->nullable()->default(null);
            $table->string('PathPhoto2',400)->nullable()->default(null);
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
