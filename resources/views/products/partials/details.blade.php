<dl class="row mb-0 gy-3">
    <dt class="col-sm-4 text-gray-600">SKU</dt>
    <dd class="col-sm-8 fw-semibold">{{ $product->sku ?? '-' }}</dd>

    <dt class="col-sm-4 text-gray-600">Kategori</dt>
    <dd class="col-sm-8 fw-semibold">{{ $product->category?->name ?? '-' }}</dd>

    <dt class="col-sm-4 text-gray-600">Supplier</dt>
    <dd class="col-sm-8 fw-semibold">{{ $product->supplier?->name ?? '-' }}</dd>

    <dt class="col-sm-4 text-gray-600">Unit</dt>
    <dd class="col-sm-8 fw-semibold">{{ $product->unit }}</dd>

    <dt class="col-sm-4 text-gray-600">Harga Beli</dt>
    <dd class="col-sm-8 fw-semibold">{{ $product->purchase_price ?? '-' }}</dd>

    <dt class="col-sm-4 text-gray-600">Harga Jual</dt>
    <dd class="col-sm-8 fw-semibold">{{ $product->selling_price ?? '-' }}</dd>

    <dt class="col-sm-4 text-gray-600">Tanggal Exp</dt>
    <dd class="col-sm-8 fw-semibold">{{ optional($product->expiry_date)->format('Y-m-d') ?? '-' }}</dd>
</dl>
