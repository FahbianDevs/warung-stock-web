<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Inventory\Models\Category;
use App\Inventory\Models\Product;
use App\Inventory\Models\StockMovement;
use App\Inventory\Models\Supplier;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function admin(): View
    {
        $today = now()->toDateString();

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

        $stockOutProducts = Product::query()
            ->where('current_stock', 0)
            ->count();

        $totalProducts = Product::query()->count();
        $totalSuppliers = Supplier::query()->count();
        $totalTransactions = StockMovement::query()->count();

        $monthlyRevenue = StockMovement::query()
            ->join('products', 'products.id', '=', 'stock_movements.product_id')
            ->where('stock_movements.type', 'out')
            ->whereMonth('stock_movements.happened_at', now()->month)
            ->whereYear('stock_movements.happened_at', now()->year)
            ->sum(DB::raw('stock_movements.qty * COALESCE(products.selling_price, 0)'));

        $inToday = StockMovement::query()
            ->where('type', 'in')
            ->whereDate('happened_at', $today)
            ->sum('qty');

        $outToday = StockMovement::query()
            ->where('type', 'out')
            ->whereDate('happened_at', $today)
            ->sum('qty');

        $lastSevenDays = collect(range(6, 0))->map(fn (int $daysAgo) => now()->subDays($daysAgo));
        $movementDaily = StockMovement::query()
            ->selectRaw('DATE(happened_at) as day, type, SUM(qty) as total')
            ->whereDate('happened_at', '>=', now()->subDays(6)->toDateString())
            ->groupBy('day', 'type')
            ->get()
            ->groupBy('day');

        $stockOverview = [
            'labels' => $lastSevenDays->map(fn (Carbon $date) => $date->format('d M'))->values(),
            'in' => $lastSevenDays->map(fn (Carbon $date) => (int) ($movementDaily[$date->toDateString()] ?? collect())->where('type', 'in')->sum('total'))->values(),
            'out' => $lastSevenDays->map(fn (Carbon $date) => (int) ($movementDaily[$date->toDateString()] ?? collect())->where('type', 'out')->sum('total'))->values(),
        ];

        $lastSixMonths = collect(range(5, 0))->map(fn (int $monthsAgo) => now()->subMonths($monthsAgo)->startOfMonth());
        $monthlyOut = StockMovement::query()
            ->join('products', 'products.id', '=', 'stock_movements.product_id')
            ->select([
                'stock_movements.happened_at',
                'stock_movements.qty',
                'products.selling_price',
            ])
            ->where('stock_movements.type', 'out')
            ->whereDate('stock_movements.happened_at', '>=', now()->subMonths(5)->startOfMonth()->toDateString())
            ->get()
            ->groupBy(fn ($row) => Carbon::parse($row->happened_at)->format('Y-m'))
            ->map(fn ($rows) => $rows->sum(fn ($row) => $row->qty * (float) ($row->selling_price ?? 0)));

        $monthlySales = [
            'labels' => $lastSixMonths->map(fn (Carbon $date) => $date->format('M'))->values(),
            'data' => $lastSixMonths->map(fn (Carbon $date) => (float) ($monthlyOut[$date->format('Y-m')] ?? 0))->values(),
        ];

        $categoryStock = Category::query()
            ->withSum('products', 'current_stock')
            ->orderBy('name')
            ->get();

        $topSellingProducts = StockMovement::query()
            ->join('products', 'products.id', '=', 'stock_movements.product_id')
            ->where('stock_movements.type', 'out')
            ->selectRaw('products.name, SUM(stock_movements.qty) as total')
            ->groupBy('products.name')
            ->orderByDesc('total')
            ->limit(6)
            ->get();

        $forecastProducts = Product::query()
            ->where('current_stock', '>', 0)
            ->orderByRaw('(current_stock - min_stock) asc')
            ->limit(5)
            ->get()
            ->map(fn (Product $product) => [
                'name' => $product->name,
                'stock' => $product->current_stock,
                'minimum' => $product->min_stock,
                'risk' => $product->current_stock <= $product->min_stock ? 'Tinggi' : ($product->current_stock <= ($product->min_stock * 2) ? 'Sedang' : 'Rendah'),
            ]);

        return view('dashboard', [
            'lowStockProducts' => $lowStockProducts,
            'expiringSoonProducts' => $expiringSoonProducts,
            'stockOutProducts' => $stockOutProducts,
            'totalProducts' => $totalProducts,
            'totalSuppliers' => $totalSuppliers,
            'totalTransactions' => $totalTransactions,
            'monthlyRevenue' => $monthlyRevenue,
            'inToday' => $inToday,
            'outToday' => $outToday,
            'stockOverview' => $stockOverview,
            'monthlySales' => $monthlySales,
            'categoryStock' => $categoryStock,
            'topSellingProducts' => $topSellingProducts,
            'forecastProducts' => $forecastProducts,
        ]);
    }

    public function user(): View
    {
        return view('user-dashboard', [
            'currentRole' => UserRole::User,
        ]);
    }
}
