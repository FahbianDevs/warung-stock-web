@if (session('status'))
    <div class="toast-panel alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-circle-check"></i>
        <span>{{ session('status') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="toast-panel alert-danger" role="alert">
        <i class="fas fa-triangle-exclamation"></i>
        <div>
            <div class="fw-bold mb-1">Periksa kembali input Anda.</div>
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    </div>
@endif
