<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('type', 20); // in | out | adjustment
            $table->unsignedInteger('qty');
            $table->integer('before_stock');
            $table->integer('after_stock');

            $table->dateTime('happened_at');
            $table->string('note', 500)->nullable();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();

            $table->index(['product_id', 'happened_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
