@extends('layouts.sb-admin')

@section('content')
    <div class="card o-hidden border-0 shadow-lg auth-card">
        <div class="card-body p-0">
            <div class="row g-0">
                <div class="col-lg-6 d-none d-lg-flex auth-visual auth-visual-login">
                    <div class="auth-visual-content">
                        <div class="text-uppercase text-xs fw-bold mb-3 text-white-50">SB Admin 2 Style</div>
                        <h2 class="text-white fw-bold mb-3">Selamat datang kembali.</h2>
                        <p class="text-white-50 mb-0">Masuk untuk mengelola stok, produk, dan aktivitas inventaris dengan antarmuka yang rapi.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900 mb-2">Login Akun</h1>
                            <p class="text-gray-600 mb-0">Gunakan email dan password Anda.</p>
                        </div>

                        @include('auth.partials.flash')

                        <form method="POST" action="{{ route('login') }}" class="user">
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan email..." required autofocus />
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password..." required />
                            </div>
                            <div class="mb-4">
                                <div class="form-check small">
                                    <input class="form-check-input" type="checkbox" name="remember" value="1" id="remember" @checked(old('remember')) />
                                    <label class="form-check-label text-gray-600" for="remember">Ingat saya</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block w-100">Login</button>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}">Lupa password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('register') }}">Belum punya akun? Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
