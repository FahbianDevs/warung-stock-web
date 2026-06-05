<form method="POST" action="{{ $action }}">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    @include('products.partials.form', ['product' => $product])

    <div class="d-flex justify-content-end mt-4">
        <button class="btn btn-primary px-4" type="submit">
            <i class="fas fa-save me-2"></i>{{ $submitLabel }}
        </button>
    </div>
</form>
