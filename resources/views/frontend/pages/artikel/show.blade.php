@extends('frontend.layouts.app')
@section('content')
    <!-- ***** Blog Start ***** -->
    <section class="section mt-5" id="blog">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="center-heading">
                        <h2 class="section-title">{{ $item->judul }}</h2>
                        <div>
                            {{ $item->created_at->translatedFormat('d F Y') . ' - ' . $item->user->name }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="text-center my-3">
                        <img src="{{ $item->gambar() }}" class="img-fluid w-100" style="max-height:550px" alt="">
                    </div>

                    {!! $item->deskripsi !!}
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->
@endsection
