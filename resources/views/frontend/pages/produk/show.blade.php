@extends('frontend.layouts.app')
@section('content')
    <!-- ***** Blog Start ***** -->
    <section class="section mt-5" id="blog">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="center-heading">
                        <h2 class="section-title">{{ $item->nama }}</h2>
                        <h6>{{ format_rupiah($item->harga) }}</h6>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <div class="col-md-7">
                    <div class="text-center my-3">
                        <img src="{{ $item->gambar() }}" class="img-fluid w-100" style="max-height:550px" alt="">
                    </div>

                    {!! $item->deskripsi !!}
                    <div class="alert alert-warning mt-5">
                        <p>Perhatian!</p>
                        <p>Jika anda membutuhkan produk custom, silahkan hubungi kami di whatsapp berikut</p>
                        <a href="{{ env('LINK_WHATSAPP') }}" target="_blank" class="btn btn-success btn-sm mt-3">Klik
                            Disini</a>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="mb-4">Form Pemesanan</h5>
                            <form action="javascript:void(0)" method="post">
                                @csrf
                                <div class='form-group mb-3'>
                                    <input type='number' name='jumlah'
                                        class='form-control @error('jumlah') is-invalid @enderror'
                                        value='{{ old('jumlah') }}' placeholder="Jumlah">
                                    @error('jumlah')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <textarea name='catatan' id='catatan' cols='30' rows='3'
                                        class='form-control @error('catatan') is-invalid @enderror' placeholder="Catatan">{{ old('catatan') }}</textarea>
                                    @error('catatan')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-block btnAddToCart">Masukan Ke Keranjang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->
@endsection
@push('scripts')
    <script>
        $(function() {
            $('.btnAddToCart').on('click', function() {
                let id = '{{ $item->id }}';
                let nama_produk = '{{ $item->nama }}';
                let harga = '{{ $item->harga }}';
                let jumlah = $('input[name=jumlah]').val();
                let catatan = $('textarea[name=catatan]').val();
                let total = harga * jumlah;

                let data = {
                    id: id,
                    nama_produk: nama_produk,
                    harga: harga,
                    jumlah: jumlah,
                    total: total,
                    catatan: catatan
                };

                let existingData = localStorage.getItem('cart');
                let existingDataObj = existingData ? JSON.parse(existingData) : [];
                existingDataObj.push(data);
                localStorage.setItem('cart', JSON.stringify(existingDataObj));

                let route_keranjang = '{{ route('keranjang.index') }}';

                window.location.href =
                    route_keranjang
            })
        })
    </script>
@endpush
