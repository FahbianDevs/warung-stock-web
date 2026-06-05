<div class="d-sm-flex align-items-start justify-content-between mb-4">
    <div class="mb-3 mb-sm-0">
        <h1 class="h3 mb-1 page-header-title">{{ $title }}</h1>
        @if (!empty($subtitle))
            <p class="page-header-subtitle mb-0">{{ $subtitle }}</p>
        @endif
    </div>

    @if (!empty($actions))
        <div class="d-flex flex-wrap gap-2 justify-content-sm-end">
            {!! $actions !!}
        </div>
    @endif
</div>
