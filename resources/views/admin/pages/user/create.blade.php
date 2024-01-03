@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">User</a></div>
                <div class="breadcrumb-item">Tambah User</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class='form-group mb-3'>
                                    <label for='avatar' class='mb-2'>Avatar</label>
                                    <input type='file' name='avatar'
                                        class='form-control @error('avatar') is-invalid @enderror'
                                        value='{{ old('avatar') }}'>
                                    @error('avatar')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        required="" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <label for='email' class='mb-2'>Email</label>
                                    <input type='text' name='email'
                                        class='form-control @error('email') is-invalid @enderror'
                                        value='{{ old('email') }}'>
                                    @error('email')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <label for='password' class='mb-2'>Password</label>
                                    <input type='password' name='password'
                                        class='form-control @error('password') is-invalid @enderror'
                                        value='{{ old('password') }}'>
                                    @error('password')
                                        <div class='invalid-feedback'>
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
                                <div class='form-group'>
                                    <label for='role'>Role</label>
                                    <select name='role' id='role'
                                        class='form-control @error('role') is-invalid @enderror'>
                                        <option value='' selected disabled>Pilih Role</option>
                                        <option @selected(old('role') === 'admin') value="admin">Admin</option>
                                        <option @selected(old('role') === 'pelanggan') value="pelanggan">Pelanggan</option>
                                    </select>
                                    @error('role')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group'>
                                    <label for='status'>Status</label>
                                    <select name='status' id='status'
                                        class='form-control @error('status') is-invalid @enderror'>
                                        <option value='' selected disabled>Pilih Status</option>
                                        <option @selected(old('status') == 0) value="0">Tidak Aktif</option>
                                        <option @selected(old('status') == 1) value="1">Aktif</option>
                                    </select>
                                    @error('status')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn float-right btn-primary">Tambah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
