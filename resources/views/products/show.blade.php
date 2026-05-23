@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h4 m-0">{{ $product->name }}</h1>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('products.edit', $product) }}">Edit</a>
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('products.index') }}">Kembali</a>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-5">SKU</dt>
                        <dd class="col-7">{{ $product->sku ?? '-' }}</dd>

                        <dt class="col-5">Kategori</dt>
                        <dd class="col-7">{{ $product->category?->name ?? '-' }}</dd>

                        <dt class="col-5">Supplier</dt>
                        <dd class="col-7">{{ $product->supplier?->name ?? '-' }}</dd>

                        <dt class="col-5">Unit</dt>
                        <dd class="col-7">{{ $product->unit }}</dd>

                        <dt class="col-5">Stok</dt>
                        <dd class="col-7">{{ $product->current_stock }}</dd>

                        <dt class="col-5">Min Stok</dt>
                        <dd class="col-7">{{ $product->min_stock }}</dd>

                        <dt class="col-5">Exp</dt>
                        <dd class="col-7">{{ optional($product->expiry_date)->format('Y-m-d') ?? '-' }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
