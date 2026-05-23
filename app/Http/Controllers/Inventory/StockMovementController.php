<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\StoreStockMovementRequest;
use App\Inventory\Models\Product;
use App\Inventory\Models\StockMovement;
use App\Inventory\Services\StockMovementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StockMovementController extends Controller
{
    public function __construct(private readonly StockMovementService $service)
    {
    }

    public function index(): View
    {
        $movements = StockMovement::query()
            ->with('product')
            ->latest('happened_at')
            ->paginate(20);

        return view('stock_movements.index', compact('movements'));
    }

    public function create(): View
    {
        return view('stock_movements.create', [
            'products' => Product::query()->orderBy('name')->get(),
        ]);
    }

    public function store(StoreStockMovementRequest $request): RedirectResponse
    {
        $this->service->record($request->validated());

        return redirect()
            ->route('stock_movements.index')
            ->with('status', 'Pergerakan stok berhasil dicatat.');
    }
}
