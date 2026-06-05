<div class="card {{ $borderClass }} h-100 py-2">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col me-3">
                <div class="text-xs fw-bold text-uppercase mb-1 {{ $textClass }}">{{ $label }}</div>
                <div class="h5 mb-0 fw-bold text-gray-800">{{ $value }}</div>
            </div>
            <div class="col-auto">
                <i class="{{ $icon }} fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>
</div>
