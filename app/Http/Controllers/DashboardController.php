<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Inventory\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function admin(): View
    {
        $lowStockProducts = Product::query()
            ->whereColumn('current_stock', '<=', 'min_stock')
            ->orderBy('current_stock')
            ->limit(10)
            ->get();

        $expiringSoonProducts = Product::query()
            ->whereNotNull('expiry_date')
            ->whereDate('expiry_date', '>=', now()->toDateString())
            ->whereDate('expiry_date', '<=', now()->addDays(30)->toDateString())
            ->orderBy('expiry_date')
            ->limit(10)
            ->get();

        return view('dashboard', [
            'lowStockProducts' => $lowStockProducts,
            'expiringSoonProducts' => $expiringSoonProducts,
        ]);
    }

    public function user(): View
    {
        return view('user-dashboard', [
            'currentRole' => UserRole::User,
        ]);
    }
}
