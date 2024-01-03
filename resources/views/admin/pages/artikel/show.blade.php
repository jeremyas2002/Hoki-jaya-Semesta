@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $item->judul }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.artikel.index') }}">Data Artikel</a></div>
                <div class="breadcrumb-item">{{ $item->judul }}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Judul</span>
                                    <span class="ml-5 text-right">{{ $item->judul }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Kategori</span>
                                    <span class="ml-5 text-right">{{ $item->kategori->nama ?? '-' }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Status</span>
                                    <span class="ml-5 text-right">
                                        @if ($item->status == 1)
                                            <span class="badge badge-success">Aktf</span>
                                        @else
                                            <span class="badge badge-danger">Tidak Aktf</span>
                                        @endif
                                    </span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Penulis</span>
                                    <span class="ml-5 text-right">{{ $item->user->name ?? '-' }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Dibuat</span>
                                    <span
                                        class="ml-5 text-right">{{ $item->created_at->translatedFormat('l, d F Y') }}</span>
                                </li>
                                <hr>
                                <li class="list-item d-flex justify-content-between">
                                    <span class="font-weight-bold">Aksi</span>
                                    <span class="ml-5 text-right">
                                        <a href="{{ route('admin.artikel.index') }}" class="btn btn-sm btn-warning"><i
                                                class="fas fa-arrow-left"></i> Kembali</a>
                                        <a href="{{ route('admin.artikel.edit', $item->id) }}"
                                            class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="" method="post" class="d-inline" id="formDelete">
                                            @csrf
                                            @method('delete')
                                            <button data-action="{{ route('admin.artikel.destroy', $item->id) }}"
                                                class="btn btn-sm btn-danger btnDelete"><i class="fas fa-trash"></i>
                                                Hapus</button>
                                        </form>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ $item->gambar() }}" class="img-fluid w-100 postImage" alt="{{ $item->judul }}">
                            <div class="description mt-3">
                                {!! $item->deskripsi !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>
        .postImage {
            max-height: 560px
        }
    </style>
@endpush
