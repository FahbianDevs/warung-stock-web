@extends('layouts.sb-admin')

@section('content')
    <div class="auth-card">
        <div class="card-body p-0">
            <div class="row g-0">
                <div class="col-lg-6 d-none d-lg-flex auth-visual auth-visual-login">
                    <div class="auth-visual-content">
                        <div class="eyebrow text-white-50 mb-3">Modern Inventory SaaS</div>
                        <h2 class="text-white fw-bold mb-3">Kontrol stok harian tanpa dashboard yang melelahkan.</h2>
                        <p class="text-white-50 mb-0">Masuk untuk melihat alert stok, transaksi gudang, forecast restock, dan laporan cepat dalam satu workspace.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="mb-4">
                            <div class="brand-mark mb-3"><i class="fas fa-store"></i></div>
                            <h1 class="h3 fw-bold mb-2">Login Warung Stock</h1>
                            <p class="text-muted mb-0">Gunakan email dan password untuk masuk ke workspace inventory.</p>
                        </div>

                        @include('auth.partials.flash')

                        <div class="row g-2 mb-3">
                            <div class="col">
                                <button class="btn btn-soft w-100" type="button"><i class="fab fa-google me-2"></i>Google</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-soft w-100" type="button"><i class="fab fa-microsoft me-2"></i>Microsoft</button>
                            </div>
                        </div>

                        <div class="text-center text-muted small mb-3">atau login dengan email</div>

                        <form method="POST" action="{{ route('login') }}" class="user">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="admin@warung.test" required autofocus />
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password" required />
                                <div class="password-meter mt-2"><span></span><span></span><span></span></div>
                            </div>
                            <div class="mb-4 d-flex justify-content-between align-items-center">
                                <div class="form-check small">
                                    <input class="form-check-input" type="checkbox" name="remember" value="1" id="remember" @checked(old('remember')) />
                                    <label class="form-check-label text-muted" for="remember">Ingat saya</label>
                                </div>
                                <a class="small fw-semibold" href="{{ route('password.request') }}">Lupa password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">Login</button>
                        </form>

                        <div class="text-center mt-4">
                            <a class="small" href="{{ route('register') }}">Belum punya akun? Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
