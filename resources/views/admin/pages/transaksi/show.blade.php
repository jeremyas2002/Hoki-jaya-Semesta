@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $item->kode }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.transaksi.index') }}">Data Transaksi</a></div>
                <div class="breadcrumb-item">{{ $item->kode }}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Kode</span>
                                    <span class="ml-5 text-right">{{ $item->kode }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Nama</span>
                                    <span class="ml-5 text-right">{{ $item->nama }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Nomor Telepon</span>
                                    <span class="ml-5 text-right">{{ $item->nomor_telepon }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Alamat</span>
                                    <span class="ml-5 text-right">{{ $item->alamat }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Bank</span>
                                    <span class="ml-5 text-right">
                                        @if ($item->bank)
                                            {{ $item->bank->nama . ' - ' . $item->bank->nomor_rekening . ' a.n ' . $item->bank->pemilik }}
                                        @endif
                                    </span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Total</span>
                                    <span class="ml-5 text-right">{{ format_rupiah($item->total) }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Status</span>
                                    <span class="ml-5 text-right">{!! $item->status() !!}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Aksi</span>
                                    <span class="ml-5 text-right">
                                        <a href="{{ route('admin.transaksi.index') }}" class="btn btn-sm btn-warning"><i
                                                class="fas fa-arrow-left"></i> Kembali</a>
                                        <a href="{{ route('admin.transaksi.edit', $item->id) }}"
                                            class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        @if ($item->status == 3)
                                            <form action="" method="post" class="d-inline" id="formDelete">
                                                @csrf
                                                @method('delete')
                                                <button data-action="{{ route('admin.transaksi.destroy', $item->id) }}"
                                                    class="btn btn-sm btn-danger btnDelete"><i class="fas fa-trash"></i>
                                                    Hapus</button>
                                            </form>
                                        @endif
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table id="dTable" class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Gambar</td>
                                        <td>Nama Produk</td>
                                        <td>Jumlah</td>
                                        <td>Total</td>
                                        <td>Catatan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->details as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ $detail->produk->gambar() }}" style="max-height:60px"
                                                    class="img-fluid" alt="">
                                            </td>
                                            <td>{{ $detail->produk->nama }}</td>
                                            <td>{{ $detail->jumlah }}</td>
                                            <td>{{ format_rupiah($detail->total) }}</td>
                                            <td>{{ $detail->catatan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@push('scripts')
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(function() {
            let otable = $('#dTable').DataTable();
        })
    </script>
    @include('admin.layouts.partials.sweetalert')
@endpush
