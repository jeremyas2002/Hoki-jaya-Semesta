@extends('frontend.layouts.app')
@section('content')
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                        <h1><strong>Hoki Jaya Semesta Interior</strong><br>Akan menyediakan design impian kalian
                        </h1>
                        <p>Hoki Jaya Semesta adalah perusahaan yang menyediakan jasa
                           Design Interior dan Furniture tempat tinggal kalian </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Small Start ***** -->
    <section class="section home-feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12"
                            data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i><img src="{{ asset('assets/frontend/') }}/images/featured-item-01.png"
                                            alt=""></i>
                                </div>
                                <h5 class="features-title">Design Architecture</h5>
                                <p>Desain arsitektur yang menciptakan keseimbangan indah antara fungsi, estetika, dan inovasi.</p>
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12"
                            data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i><img src="{{ asset('assets/frontend/') }}/images/featured-item-01.png"
                                            alt=""></i>
                                </div>
                                <h5 class="features-title">Landscape</h5>
                                <p>Rancang taman impian anda bersama layanan lanskap kami. Kami hadir untuk menciptakan ruang outdoor yang harmonis.</p>
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12"
                            data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i><img src="{{ asset('assets/frontend/') }}/images/featured-item-01.png"
                                            alt=""></i>
                                </div>
                                <h5 class="features-title">Furniture Custom</h5>
                                <p>Tingkatkan keindahan ruangan anda dengan layanan furnitur custom kami. Temukan kreasi unik yang sesuai dengan gaya anda</p>
                        </div>
                        <!-- ***** Features Small Item End ***** -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-top-70 padding-bottom-0" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="{{ asset('assets/frontend/') }}/images/011.jpg"
                        class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                    <div class="left-heading">
                        <h2 class="section-title">Siapa Kami ?</h2>
                    </div>
                    <div class="left-text">
                        <p>Hoki Jaya Semesta Interior merupakan penyedia jasa desain interior yang menonjolkan konsep inovatif dan sistem kabinet premium. 
                            Dengan komitmen pada layanan berkualitas, perusahaan ini memberikan pengalaman desain yang mengedepankan keunikan dan keeleganan.</p>
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

    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                    <div class="left-heading">
                        <h2 class="section-title">Kenapa pilih kami ?</h2>
                    </div>
                    <div class="left-text">
                        <p>Hoki Jaya Semesta telah membuktikan komitmen dalam menjaga kualitas produk. Fokus utama kami tidak hanya terletak pada penyempurnaan desain interior, 
                            tetapi juga pada peningkatan terus-menerus untuk meningkatkan tingkat kepuasan dan membangun kepercayaan pelanggan.</p>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="{{ asset('assets/frontend/') }}/images/002.jpg"
                        class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Home Parallax Start ***** -->
    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>Keuungulan</h1>
                            <p>Berikut adalah poin-poin unggul yang kami miliki.</p>
                        </div>
                    </div>
                </div>

                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/frontend/') }}/images/work-process-item-01.png"
                                    alt=""></i>
                            <strong>Harga sesuai budget</strong>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/frontend/') }}/images/work-process-item-01.png"
                                    alt=""></i>
                            <strong>Dilayani oleh profesional</strong>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/frontend/') }}/images/work-process-item-01.png"
                                    alt=""></i>
                            <strong>Gratis ongkir pengerjaan</strong>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/frontend/') }}/images/work-process-item-01.png"
                                    alt=""></i>
                            <strong>Garansi pengerjaan</strong>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/frontend/') }}/images/work-process-item-01.png"
                                    alt=""></i>
                            <strong>Siap maintenance</strong>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/frontend/') }}/images/work-process-item-01.png"
                                    alt=""></i>
                            <strong>Produk berkualitas</strong>
                        </a>
                    </div>
                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Home Parallax End ***** -->

    <!-- ***** Counter Parallax Start ***** -->
    <section class="counter">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-bottom">
                            <strong>1265</strong>
                            <span>Projects</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-top">
                            <strong>863</strong>
                            <span>Happy Clients</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-bottom">
                            <strong>78</strong>
                            <span>Workers</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item">
                            <strong>4</strong>
                            <span>Branches</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Counter Parallax End ***** -->

    <!-- ***** Produk Start ***** -->
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
                        <p>Temukan produk furniture yang elegan dan berkualitas untuk melengkapi isi rumah anda.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                @foreach ($data_produk as $produk)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('produk.show', $produk->slug) }}">
                            <div class="blog-post-thumb">
                                <div class="img">
                                    <img src="{{ $produk->gambar() }}" class="img-fluid" alt="">
                                </div>
                                <div class="blog-content">
                                    <h3>
                                        <a href="{{ route('produk.show', $produk->slug) }}">{{ $produk->nama }}</a>
                                    </h3>
                                    <h5>{{ format_rupiah($produk->harga) }}</h5>
                                    <div class="text">
                                        {{ $produk->deskripsi_singkat }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** produk End ***** -->

    <!-- ***** Blog Start ***** -->
    <section class="section" id="blog">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Artikel</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Temukan artikel dan tips menarik seputar furniture, cara perawatan, bahan furniture, inspirasi desain, dan lainnya.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                @foreach ($data_artikel as $artikel)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="blog-post-thumb">
                            <div class="img">
                                <img src="{{ $artikel->gambar() }}" class="img-fluid" alt="">
                            </div>
                            <div class="blog-content">
                                <h3>
                                    <a href="{{ route('artikel.show', $artikel->slug) }}">{{ $artikel->judul }}</a>
                                </h3>
                                <div class="text">
                                    {{ $artikel->deskripsi_singkat }}
                                </div>
                                <a href="{{ route('artikel.show', $artikel->slug) }}" class="main-button">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->
@endsection
