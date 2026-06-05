<div class="card h-100">
    @if (!empty($title))
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h6 class="m-0 fw-bold text-primary">{{ $title }}</h6>
            @if (!empty($headerAction))
                <div>{!! $headerAction !!}</div>
            @endif
        </div>
    @endif

    <div class="{{ $bodyClass ?? 'card-body' }}">
        {!! $slot !!}
    </div>
</div>
