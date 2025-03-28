<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->text('address');
            $table->string('product_name');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['Pending', 'Confirmed', 'Shipped', 'Delivered', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
