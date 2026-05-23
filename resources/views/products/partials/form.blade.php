@php
    $value = fn (string $key, $default = null) => old($key, data_get($product, $key, $default));
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nama</label>
        <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $value('name') }}" required />
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">SKU (opsional)</label>
        <input class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ $value('sku') }}" />
        @error('sku') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Kategori</label>
        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
            <option value="">-</option>
            @foreach ($categories as $c)
                <option value="{{ $c->id }}" @selected((string) $value('category_id') === (string) $c->id)>{{ $c->name }}</option>
            @endforeach
        </select>
        @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Supplier</label>
        <select class="form-select @error('supplier_id') is-invalid @enderror" name="supplier_id">
            <option value="">-</option>
            @foreach ($suppliers as $s)
                <option value="{{ $s->id }}" @selected((string) $value('supplier_id') === (string) $s->id)>{{ $s->name }}</option>
            @endforeach
        </select>
        @error('supplier_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Unit</label>
        <input class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ $value('unit', 'pcs') }}" required />
        @error('unit') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Min Stok</label>
        <input
            type="number"
            min="0"
            class="form-control @error('min_stock') is-invalid @enderror"
            name="min_stock"
            value="{{ $value('min_stock', 0) }}"
            required
        />
        @error('min_stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Stok Awal</label>
        <input
            type="number"
            min="0"
            class="form-control @error('current_stock') is-invalid @enderror"
            name="current_stock"
            value="{{ $value('current_stock', 0) }}"
        />
        @error('current_stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Harga Beli (opsional)</label>
        <input type="number" min="0" step="0.01" class="form-control @error('purchase_price') is-invalid @enderror" name="purchase_price" value="{{ $value('purchase_price') }}" />
        @error('purchase_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Harga Jual (opsional)</label>
        <input type="number" min="0" step="0.01" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price" value="{{ $value('selling_price') }}" />
        @error('selling_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Tanggal Exp (opsional)</label>
        <input type="date" class="form-control @error('expiry_date') is-invalid @enderror" name="expiry_date" value="{{ $value('expiry_date') }}" />
        @error('expiry_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 d-flex align-items-end">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked($value('is_active', true)) />
            <label class="form-check-label">Aktif</label>
        </div>
    </div>
</div>
