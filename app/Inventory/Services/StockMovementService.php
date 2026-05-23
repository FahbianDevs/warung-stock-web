<?php

namespace App\Inventory\Services;

use App\Inventory\Models\Product;
use App\Inventory\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class StockMovementService
{
    /**
     * @param  array{product_id:int,type:string,qty:int,happened_at:string,note?:string|null}  $payload
     */
    public function record(array $payload): StockMovement
    {
        return DB::transaction(function () use ($payload) {
            /** @var Product $product */
            $product = Product::query()->lockForUpdate()->findOrFail($payload['product_id']);

            $before = (int) $product->current_stock;
            $qty = (int) $payload['qty'];

            $after = match ($payload['type']) {
                'in' => $before + $qty,
                'out' => $before - $qty,
                'adjustment' => $qty,
                default => throw new RuntimeException('Tipe stock movement tidak valid.'),
            };

            if ($after < 0) {
                throw new RuntimeException('Stok tidak boleh minus.');
            }

            $product->update(['current_stock' => $after]);

            return StockMovement::create([
                'product_id' => $product->id,
                'type' => $payload['type'],
                'qty' => $qty,
                'before_stock' => $before,
                'after_stock' => $after,
                'happened_at' => $payload['happened_at'],
                'note' => $payload['note'] ?? null,
                'user_id' => null,
            ]);
        });
    }
}
