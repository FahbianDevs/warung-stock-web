<form method="POST" action="{{ route('stock_movements.store') }}">
    @csrf

    <div class="row g-4">
        <div class="col-md-6">
            <label class="form-label fw-semibold">Produk</label>
            <select class="form-select @error('product_id') is-invalid @enderror" name="product_id" required>
                <option value="">Pilih produk...</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @selected((string) old('product_id') === (string) $product->id)>{{ $product->name }}</option>
                @endforeach
            </select>
            @error('product_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3">
            <label class="form-label fw-semibold">Tipe</label>
            <select class="form-select @error('type') is-invalid @enderror" name="type" required>
                <option value="in" @selected(old('type', 'in') === 'in')>Masuk</option>
                <option value="out" @selected(old('type') === 'out')>Keluar</option>
                <option value="adjustment" @selected(old('type') === 'adjustment')>Set (Adjustment)</option>
            </select>
            @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-3">
            <label class="form-label fw-semibold">Qty</label>
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
            <label class="form-label fw-semibold">Catatan (opsional)</label>
            <input class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}" placeholder="Contoh: stok opname pagi hari" />
            @error('note') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="d-flex justify-content-end mt-4">
        <button class="btn btn-primary px-4" type="submit">
            <i class="fas fa-save me-2"></i>Simpan Pergerakan
        </button>
    </div>
</form>
