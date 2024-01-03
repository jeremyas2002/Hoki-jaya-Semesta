@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Artikel</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.artikel.index') }}">Data Artikel</a></div>
                <div class="breadcrumb-item">Edit Artikel</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.artikel.update', $item->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <label for="gambar">Gambar</label>
                                        <b></b>
                                        <img src="{{ $item->gambar() }}" class="img-fluid" style="max-height: 60px"
                                            alt="">
                                    </div>
                                    <div class="col-md-10 align-self-center">
                                        <input type="file" name="gambar"
                                            class="form-control @error('gambar') is-invalid @enderror">
                                        @error('gambar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" value="{{ $item->judul ?? old('judul') }}" id="judul">
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kategori_id">Kategori</label>
                                    <select name="kategori_id" id="kategori_id"
                                        class="form-control @error('kategori_id') is-invalid @enderror">
                                        <option value="" selected disabled>Pilih Kategori</option>
                                        @foreach ($data_kategori as $kategori)
                                            <option @if ($kategori->id == $item->kategori_id) selected @endif
                                                value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <label for='deskripsi_singkat' class='mb-2'>Deskripsi Singkat</label>
                                    <textarea name='deskripsi_singkat' id='deskripsi_singkat' cols='30' rows='3'
                                        class='form-control @error('deskripsi_singkat') is-invalid @enderror'>{{ $item->deskripsi_singkat ?? old('deskripsi_singkat') }}</textarea>
                                    @error('deskripsi_singkat')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="" selected disabled>Pilih Status</option>
                                        <option @if ($item->status === 1) selected @endif value="1">
                                            Aktif</option>
                                        <option @if ($item->status == 0) selected @endif value="0">
                                            Tidak Aktif
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30"
                                        rows="5">{{ $item->deskripsi ?? old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-block btn-primary"><i class="fas fa-save"></i>
                                        Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugin/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/plugin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/plugin/select2/js/select2.min.js') }}"></script>
    <script>
        $(function() {
            $('#post_tag_id').select2({
                theme: 'bootstrap4'
            });
            CKEDITOR.replace('deskripsi');
        })
    </script>
@endpush
