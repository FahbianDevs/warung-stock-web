<?php

namespace App\Inventory\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'name',
        'category_id',
        'supplier_id',
        'unit',
        'min_stock',
        'current_stock',
        'purchase_price',
        'selling_price',
        'expiry_date',
        'is_active',
    ];

    protected $casts = [
        'expiry_date' => 'date',
        'is_active' => 'boolean',
        'purchase_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function movements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }
}
