@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.transaksi.index') }}">Data Transaksi</a></div>
                <div class="breadcrumb-item">Edit Transaksi</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.transaksi.update', $item->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ $item->nama ?? old('nama') }}" id="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror"
                                        name="nomor_telepon" value="{{ $item->nomor_telepon ?? old('nomor_telepon') }}"
                                        id="nomor_telepon">
                                    @error('nomor_telepon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <label for='alamat' class='mb-2'>Alamat</label>
                                    <textarea name='alamat' id='alamat' cols='30' rows='3'
                                        class='form-control @error('alamat') is-invalid @enderror'>{{ $item->alamat ?? old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                @if ($item->bank)
                                    <div class='form-group mb-3'>
                                        <label for='bank' class='mb-2'>Bank</label>
                                        <input type='text' name='bank'
                                            class='form-control @error('bank') is-invalid @enderror'
                                            value=' {{ $item->bank->nama . ' - ' . $item->bank->nomor_rekening . ' a.n ' . $item->bank->pemilik }}'
                                            disabled>
                                        @error('bank')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @endif
                                <div class='form-group'>
                                    <label for='status'>Status</label>
                                    <select name='status' id='status'
                                        class='form-control @error('status') is-invalid @enderror'>
                                        <option value='' selected disabled>Pilih status</option>
                                        <option @selected($item->status == 0) value="0">Menunggu Proses</option>
                                        <option @selected($item->status == 1) value="1">Diproses</option>
                                        <option @selected($item->status == 2) value="2">Selesai</option>
                                        <option @selected($item->status == 3) value="3">Batal</option>
                                    </select>
                                    @error('status')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <label for='total' class='mb-2'>Total</label>
                                    <input type='text' name='total'
                                        class='form-control @error('total') is-invalid @enderror'
                                        value='{{ format_rupiah($item->total) }}' disabled>
                                    @error('total')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-block btn-primary"><i class="fas fa-save"></i>
                                        Update</button>
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
            $('.select2').select2({
                theme: 'bootstrap4'
            });
            CKEDITOR.replace('deskripsi');
        })
    </script>
@endpush
