@extends('layouts.app')

@section('content')
    @include('components.page-header', [
        'title' => 'Dashboard User',
        'subtitle' => 'Halaman pengguna untuk mengakses ringkasan inventaris sesuai peran yang diberikan.',
        'actions' => '<a class="btn btn-outline-primary btn-sm shadow-sm" href="' . route('stock_movements.index') . '"><i class="fas fa-clock-rotate-left me-2"></i>Lihat Riwayat</a>',
    ])

    <div class="row g-4">
        <div class="col-xl-4 col-md-6">
            @include('components.stat-card', [
                'label' => 'Akses Role',
                'value' => 'User Biasa',
                'icon' => 'fas fa-user',
                'borderClass' => 'border-left-info',
                'textClass' => 'text-info',
            ])
        </div>
        <div class="col-xl-4 col-md-6">
            @include('components.stat-card', [
                'label' => 'Fitur Utama',
                'value' => 'Pantau stok',
                'icon' => 'fas fa-box',
                'borderClass' => 'border-left-primary',
                'textClass' => 'text-primary',
            ])
        </div>
        <div class="col-xl-4 col-md-6">
            @include('components.stat-card', [
                'label' => 'Aktivitas',
                'value' => 'Lihat pergerakan',
                'icon' => 'fas fa-chart-column',
                'borderClass' => 'border-left-success',
                'textClass' => 'text-success',
            ])
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-lg-8">
            @include('components.content-card', [
                'title' => 'Informasi Akses',
                'slot' => '<p class="mb-0 text-gray-600">Anda login sebagai user biasa. Akses halaman ini dibatasi menggunakan middleware role agar area admin tetap terproteksi.</p>',
            ])
        </div>
    </div>
@endsection
