@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h4 m-0">Edit Produk</h1>
        <a class="btn btn-outline-secondary btn-sm" href="{{ route('products.index') }}">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('products.update', $product) }}">
                @csrf
                @method('PUT')
                @include('products.partials.form', ['product' => $product])
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
