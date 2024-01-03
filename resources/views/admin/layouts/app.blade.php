<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.partials.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right ml-auto">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Str::ucfirst(auth()->user()->name) }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title"></div>
                            <a href="{{ route('admin.profile.index') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Edit Profile
                            </a>
                            <a href="{{ route('admin.change-password.index') }}" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Ubah Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void()" onclick="document.getElementById('formLogout').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form action="{{ route('logout') }}" method="post" id="formLogout">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('admin.dashboard') }}">Hoki Jaya Semesta</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ route('admin.dashboard') }}">Hoki Jaya Semesta</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                                    class="fas fa-fire"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.produk.index') }}"><i
                                    class="fas fa-box"></i>
                                <span>Produk</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.transaksi.index') }}"><i
                                    class="fas fa-exchange-alt"></i>

                                <span>Transaksi</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.galeri.index') }}"><i
                                    class="far fa-image"></i>
                                <span>Galeri</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.bank.index') }}"><i
                                    class="fas fa-university"></i>

                                <span>Bank</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-newspaper"></i>
                                <span>Artikel</span></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="{{ route('admin.kategori.index') }}">Kategori</a></li>
                                <li class="nav-item"><a href="{{ route('admin.artikel.index') }}">Artikel</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-newspaper"></i>
                                <span>Master</span></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a href="{{ route('admin.testimoni.index') }}">Testimoni</a>
                                </li>
                                <li class="nav-item"><a href="{{ route('admin.pesan-masuk.index') }}">Pesan Masuk</a>
                                </li>
                                <li class="nav-item"><a href="{{ route('admin.users.index') }}">User</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            <footer class="main-footer">
                <div class="text-center">
                    &copy; Copyright 2023 By Jo
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    @include('admin.layouts.partials.scripts')
</body>

</html>
