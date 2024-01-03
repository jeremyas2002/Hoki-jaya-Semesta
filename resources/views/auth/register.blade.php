@extends('auth.app')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class='form-group mb-3'>
                                    <label for='name' class='mb-2'>Nama</label>
                                    <input type='text' name='name'
                                        class='form-control @error('name') is-invalid @enderror'
                                        value='{{ old('name') }}'>
                                    @error('name')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" tabindex="1" required autofocus>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        tabindex="2" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class='form-group mb-3'>
                                    <label for='password_confirmation' class='mb-2'>Konfirmasi Password</label>
                                    <input type='password' name='password_confirmation'
                                        class='form-control @error('password_confirmation') is-invalid @enderror'
                                        value='{{ old('password_confirmation') }}'>
                                    @error('password_confirmation')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                                        Register
                                    </button>
                                </div>
                            </form>
                            <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
                            <p>Kembali ke <a href="{{ route('home') }}">Home</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
