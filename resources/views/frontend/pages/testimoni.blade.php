@extends('frontend.layouts.app')
@section('content')
    <!-- ***** Testimonials Start ***** -->
    <section class="section mt-5" id="testimonials">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Bagaimana feedback pelanggan?</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Berikut adalah pesan-pesan terkait layanan Hoki Jaya Semesta dari para pelanggan kami.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                @foreach ($items as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="team-item">
                            <div class="team-content">
                                <i><img src="{{ asset('assets/frontend/') }}/images/testimonial-icon.png"
                                        alt=""></i>
                                <p>{{ $item->pesan }}</p>
                                <div class="user-image">
                                    <img src="{{ $item->gambar() }}" class="img-fluid" alt="">
                                </div>
                                <div class="team-info">
                                    <h4 class="user-name mt-2 ">{{ $item->nama }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Testimonials End ***** -->
@endsection
