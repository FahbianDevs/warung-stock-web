<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('sku', 50)->nullable()->unique();
            $table->string('name');

            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('supplier_id')->nullable()->constrained()->nullOnDelete();

            $table->string('unit', 30);
            $table->unsignedInteger('min_stock')->default(0);
            $table->unsignedInteger('current_stock')->default(0);

            $table->decimal('purchase_price', 12, 2)->nullable();
            $table->decimal('selling_price', 12, 2)->nullable();

            $table->date('expiry_date')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
