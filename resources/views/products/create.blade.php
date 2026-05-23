@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h4 m-0">Tambah Produk</h1>
        <a class="btn btn-outline-secondary btn-sm" href="{{ route('products.index') }}">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('products.store') }}">
                @csrf
                @include('products.partials.form', ['product' => null])
                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
