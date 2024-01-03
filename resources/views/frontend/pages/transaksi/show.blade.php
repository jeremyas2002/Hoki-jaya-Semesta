@extends('frontend.layouts.app')
@section('content')
    <!-- ***** Contact Us Start ***** -->
    <section class="section mt-5" id="contact-us">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Detail Transaksi</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <div class="col-md-4">
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
                    </ul>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md">
                    <table id="dTable" class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Produk</td>
                                <td>Harga</td>
                                <td>Jumlah</td>
                                <td>Total</td>
                                <td>Catatan</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->details as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->produk->nama }}</td>
                                    <td>{{ format_rupiah($detail->produk->harga) }}</td>
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
    </section>
    <!-- ***** Contact Us End ***** -->
@endsection
