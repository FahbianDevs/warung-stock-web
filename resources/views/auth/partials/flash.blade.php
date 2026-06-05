@if (session('status'))
    <div class="alert alert-success" role="alert">
        <i class="fas fa-circle-check me-2"></i>{{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-triangle-exclamation me-2"></i>{{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <div class="fw-bold mb-2">Periksa kembali form Anda.</div>
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
