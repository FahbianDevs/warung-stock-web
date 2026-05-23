<?php

namespace App\Inventory\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockMovement extends Model
{
    protected $fillable = [
        'product_id',
        'type',
        'qty',
        'before_stock',
        'after_stock',
        'happened_at',
        'note',
        'user_id',
    ];

    protected $casts = [
        'happened_at' => 'datetime',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
