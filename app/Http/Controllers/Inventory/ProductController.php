<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\StoreProductRequest;
use App\Http\Requests\Inventory\UpdateProductRequest;
use App\Inventory\Models\Category;
use App\Inventory\Models\Product;
use App\Inventory\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with(['category', 'supplier'])
            ->orderBy('name')
            ->paginate(15);

        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        return view('products.create', [
            'categories' => Category::query()->orderBy('name')->get(),
            'suppliers' => Supplier::query()->orderBy('name')->get(),
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        Product::create($request->validated());

        return redirect()
            ->route('products.index')
            ->with('status', 'Produk berhasil dibuat.');
    }

    public function show(Product $product): View
    {
        $product->load(['category', 'supplier']);

        return view('products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('products.edit', [
            'product' => $product,
            'categories' => Category::query()->orderBy('name')->get(),
            'suppliers' => Supplier::query()->orderBy('name')->get(),
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return redirect()
            ->route('products.index')
            ->with('status', 'Produk berhasil diupdate.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('status', 'Produk berhasil dihapus.');
    }
}
