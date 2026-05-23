<?php

namespace App\Providers;

use App\Inventory\Models\Product;
use App\Inventory\Models\StockMovement;
use App\Policies\ProductPolicy;
use App\Policies\StockMovementPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Product::class => ProductPolicy::class,
        StockMovement::class => StockMovementPolicy::class,
    ];
}
