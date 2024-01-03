<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('assets/frontend') }}/images/hoki-jaya-logo.png" alt="Hoki Jaya Semesta" />
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('produk.index') }}">Produk</a></li>
                        <li><a href="{{ route('artikel.index') }}">Artikel</a></li>
                        <li><a href="{{ route('testimoni') }}">Testimonial</a></li>
                        <li><a href="{{ route('galeri.index') }}">Galeri</a></li>
                        <li><a href="{{ route('kontak.index') }}">Kontak</a></li>
                        <li><a href="{{ route('tentang') }}">Tentang</a></li>
                        @guest
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link p-0 mt-0 dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if (auth()->user()->role === 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('transaksi.index') }}">Transaksi</a>
                                    <a class="dropdown-item" href="#"
                                        onclick="document.getElementById('formLogout').submit();">Logout</a>
                                </div>

                                <form action="{{ route('logout') }}" method="post" id="formLogout">
                                    @csrf
                                </form>
                            </li>
                        @endguest

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
