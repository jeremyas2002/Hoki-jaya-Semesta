@extends('frontend.layouts.app')
@section('content')
    <!-- ***** Contact Us Start ***** -->
    <section class="section" id="contact-us">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Riwayat Transaksi</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <div class="table-responsive">
                    <table class="table  table-hover" id="dTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th style="min-width: 220px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->created_at->translatedFormat('H:i:s d/m/Y') }}</td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nomor_telepon }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ format_rupiah($item->total) }}</td>
                                    <td>{!! $item->status() !!}</td>
                                    <td>
                                        <a href="{{ route('transaksi.show', $item->uuid) }}" class="btn btn-sm btn-warning">
                                            Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->
@endsection
