@extends('frontend.layouts.app')
@section('content')
    <!-- ***** Features Big Item Start ***** -->
    <section class="section mt-5 padding-top-70 padding-bottom-0 mt-4" id="features">
        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Tentang</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Hoki Jaya Semesta Interior merupakan penyedia jasa desain interior yang menonjolkan konsep inovatif dan sistem kabinet premium. 
                            Dengan komitmen pada layanan berkualitas, perusahaan ini memberikan pengalaman desain yang mengedepankan keunikan dan keeleganan.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="{{ asset('assets/frontend/') }}/images/002.jpg"
                        class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                    <div class="left-heading">
                        <h2 class="section-title">Kenapa pilih kami?</h2>
                    </div>
                    <div class="left-text">
                        <p>Hoki Jaya Semesta telah membuktikan komitmen dalam menjaga kualitas produk. Fokus utama kami tidak hanya terletak pada penyempurnaan desain interior, 
                        tetapi juga pada peningkatan terus-menerus untuk meningkatkan tingkat kepuasan dan membangun kepercayaan pelanggan.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->
@endsection
