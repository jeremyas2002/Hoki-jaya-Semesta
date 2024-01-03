@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Testimoni</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.testimoni.index') }}">Testimoni</a></div>
                <div class="breadcrumb-item">Tambah Testimoni</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.testimoni.store') }}" method="post" class="needs-validation"
                                novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class='form-group mb-3'>
                                    <label for='gambar' class='mb-2'>Gambar</label>
                                    <input type='file' name='gambar'
                                        class='form-control @error('gambar') is-invalid @enderror'
                                        value='{{ old('gambar') }}'>
                                    @error('gambar')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        required="" name="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <label for='pesan' class='mb-2'>Pesan</label>
                                    <textarea name='pesan' id='pesan' cols='30' rows='3'
                                        class='form-control @error('pesan') is-invalid @enderror'>{{ old('pesan') }}</textarea>
                                    @error('pesan')
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
