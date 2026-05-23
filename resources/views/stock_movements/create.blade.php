@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h4 m-0">Catat Pergerakan Stok</h1>
        <a class="btn btn-outline-secondary btn-sm" href="{{ route('stock_movements.index') }}">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('stock_movements.store') }}">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Produk</label>
                        <select class="form-select @error('product_id') is-invalid @enderror" name="product_id" required>
                            <option value="">Pilih produk...</option>
                            @foreach ($products as $p)
                                <option value="{{ $p->id }}" @selected((string) old('product_id') === (string) $p->id)>{{ $p->name }}</option>
                            @endforeach
                        </select>
                        @error('product_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tipe</label>
                        <select class="form-select @error('type') is-invalid @enderror" name="type" required>
                            <option value="in" @selected(old('type', 'in') === 'in')>Masuk</option>
                            <option value="out" @selected(old('type') === 'out')>Keluar</option>
                            <option value="adjustment" @selected(old('type') === 'adjustment')>Set (Adjustment)</option>
                        </select>
                        @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Qty</label>
                        <input
                            type="number"
                            min="1"
                            class="form-control @error('qty') is-invalid @enderror"
                            name="qty"
                            value="{{ old('qty', 1) }}"
                            required
                        />
                        @error('qty') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Catatan (opsional)</label>
                        <input class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}" />
                        @error('note') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
