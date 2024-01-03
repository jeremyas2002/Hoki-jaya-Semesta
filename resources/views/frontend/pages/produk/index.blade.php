@extends('frontend.layouts.app')
@section('content')
    <!-- ***** Blog Start ***** -->
    <section class="section mt-5" id="blog">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Produk</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Jelajahi dan miliki produk baru kami! Dapatkan inspirasi dari tampilan dan ide dekorasi rumah musim ini, di sini 
                            anda akan menemukan pilihan produk terbaru Hoki Jaya Semesta.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                @foreach ($items as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('produk.show', $item->slug) }}">
                            <div class="blog-post-thumb">
                                <div class="img">
                                    <img src="{{ $item->gambar() }}" class="img-fluid" alt="">
                                </div>
                                <div class="blog-content">
                                    <h3>
                                        <a href="{{ route('produk.show', $item->slug) }}">{{ $item->nama }}</a>
                                    </h3>
                                    <h5>{{ format_rupiah($item->harga) }}</h5>
                                    <div class="text">
                                        {{ $item->deskripsi_singkat }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->
@endsection
