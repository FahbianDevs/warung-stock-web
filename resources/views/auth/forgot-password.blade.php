@extends('layouts.sb-admin')

@section('content')
    <div class="card o-hidden border-0 shadow-lg auth-card">
        <div class="card-body p-0">
            <div class="row g-0">
                <div class="col-lg-6 d-none d-lg-flex auth-visual auth-visual-forgot">
                    <div class="auth-visual-content">
                        <div class="text-uppercase text-xs fw-bold mb-3 text-white-50">Password Recovery</div>
                        <h2 class="text-white fw-bold mb-3">Reset password Anda.</h2>
                        <p class="text-white-50 mb-0">Masukkan email dan kami akan mengirimkan tautan reset password jika akun tersedia.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                            <p class="text-gray-600 mb-0">Form sederhana untuk meminta link reset password melalui email.</p>
                        </div>

                        @include('auth.partials.flash')

                        <form method="POST" action="{{ route('password.email') }}" class="user">
                            @csrf
                            <div class="mb-4">
                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan email..." required />
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block w-100">Kirim Link Reset</button>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('register') }}">Buat akun baru</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Kembali ke login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
