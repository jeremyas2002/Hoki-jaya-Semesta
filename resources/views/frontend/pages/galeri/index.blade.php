@extends('frontend.layouts.app')
@section('content')
    <!-- ***** Blog Start ***** -->
    <section class="section mt-5" id="blog">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Galeri</h2>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                @foreach ($items as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('galeri.show', $item->id) }}">
                            <div class="blog-post-thumb">
                                <div class="img">
                                    <img src="{{ $item->gambar() }}" class="img-fluid" alt="">
                                </div>
                                <div class="blog-content">
                                    <h3>
                                        <a href="{{ route('galeri.show', $item->id) }}">{{ $item->judul }}</a>
                                    </h3>
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
