@extends('layouts.sb-admin')

@section('content')
    <div class="card o-hidden border-0 shadow-lg auth-card my-5">
        <div class="card-body p-0">
            <div class="row g-0">
                <div class="col-lg-5 d-none d-lg-flex auth-visual auth-visual-register">
                    <div class="auth-visual-content">
                        <div class="text-uppercase text-xs fw-bold mb-3 text-white-50">User Registration</div>
                        <h2 class="text-white fw-bold mb-3">Buat akun baru.</h2>
                        <p class="text-white-50 mb-0">Akun baru otomatis terdaftar sebagai user biasa dan diarahkan ke dashboard pengguna.</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900 mb-2">Create an Account</h1>
                            <p class="text-gray-600 mb-0">Daftar untuk mulai menggunakan sistem inventaris.</p>
                        </div>

                        @include('auth.partials.flash')

                        <form method="POST" action="{{ route('register') }}" class="user">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama lengkap" required />
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Alamat email" required />
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Password" required />
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Ulangi password" required />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block w-100">Register Account</button>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}">Lupa password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Sudah punya akun? Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
