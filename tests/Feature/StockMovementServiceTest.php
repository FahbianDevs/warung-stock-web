<?php

use App\Inventory\Models\Product;
use App\Inventory\Services\StockMovementService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('stock movement in adds stock', function () {
    $product = Product::create([
        'name' => 'Gula 1kg',
        'unit' => 'pcs',
        'min_stock' => 2,
        'current_stock' => 0,
        'is_active' => true,
    ]);

    $service = app(StockMovementService::class);

    $movement = $service->record([
        'product_id' => $product->id,
        'type' => 'in',
        'qty' => 5,
        'happened_at' => now()->toDateTimeString(),
        'note' => 'Restock',
    ]);

    expect($movement->after_stock)->toBe(5);
    expect($product->fresh()->current_stock)->toBe(5);
});

test('stock movement out cannot make stock negative', function () {
    $product = Product::create([
        'name' => 'Kopi Sachet',
        'unit' => 'pcs',
        'min_stock' => 0,
        'current_stock' => 1,
        'is_active' => true,
    ]);

    $service = app(StockMovementService::class);

    $fn = fn () => $service->record([
        'product_id' => $product->id,
        'type' => 'out',
        'qty' => 2,
        'happened_at' => now()->toDateTimeString(),
    ]);

    expect($fn)->toThrow(RuntimeException::class, 'Stok tidak boleh minus.');
});
