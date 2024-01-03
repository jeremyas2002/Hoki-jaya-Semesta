@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Data Produk</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.produk.create') }}" class="btn btn-sm btn-primary mb-3 btnAdd"><i
                                    class="fas fa-plus"></i> Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th style="min-width: 220px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ $item->gambar() }}" style="max-height:60px"
                                                        class="img-fluid" alt="">
                                                </td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ format_rupiah($item->harga) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.produk.show', $item->id) }}"
                                                        class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> Detail</a>
                                                    <a href="{{ route('admin.produk.edit', $item->id) }}"
                                                        class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                                    <form action="" method="post" class="d-inline" id="formDelete">
                                                        @csrf
                                                        @method('delete')
                                                        <button data-action="{{ route('admin.produk.destroy', $item->id) }}"
                                                            class="btn btn-sm btn-danger btnDelete"><i
                                                                class="fas fa-trash"></i>
                                                            Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
            $('.btnAdd').on('click', function() {
                $('#myModal .modal-title').text('Tambah Data');
                $('#myModal').modal('show');
            })
            $('body').on('click', '.btnDelete', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let action = $(this).data('action');
                        $('#formDelete').attr('action', action);
                        $('#formDelete').submit();
                    }
                })
            })
        })
    </script>
    @include('admin.layouts.partials.sweetalert')
@endpush
