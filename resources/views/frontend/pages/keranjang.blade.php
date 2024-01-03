@extends('frontend.layouts.app')
@section('content')
    <!-- ***** Features Big Item Start ***** -->
    <section class="section mt-5 padding-top-70 padding-bottom-0 mt-4" id="features">
        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Keranjang</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-name">Nama Produk</th>
                                    <th class="product-price">Harga</th>
                                    <th class="product-quantity">Jumlah</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <form action="javascript:void(0)">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="text-black h4" for="coupon">Form Pemesanan</label>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control py-3" placeholder="Nama Lengkap" id="nama"
                                    required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control py-3" placeholder="Nomor Telepon"
                                    id="nomor_telepon" required>
                            </div>
                            <div class="col-md-12">
                                <div class='form-group'>
                                    <select name='bank_id' id='bank_id'
                                        class='form-control @error('bank_id') is-invalid @enderror' required>
                                        <option value='' selected disabled>Pilih Bank</option>
                                        @foreach ($data_bank as $bank)
                                            <option @selected($bank->id == old('bank_id')) value='{{ $bank->id }}'>
                                                {{ $bank->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('bank_id')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" placeholder="Alamat lengkap"
                                    required></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 text-left border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Keranjang Total</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black" id="total">0</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg py-3 btn-block btnPesan">Pesan
                                        Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->
@endsection
@push('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            function formatRupiah(angka) {
                let numberString = angka.toString();
                let split = numberString.split('.');
                let sisa = split[0].length % 3;
                let rupiah = split[0].substr(0, sisa);
                let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    let separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp ' + rupiah;
            }


            function showDataInTable() {
                // Mendapatkan data dari localStorage
                let storedData = localStorage.getItem('cart');

                // Memastikan bahwa ada data yang tersimpan
                if (storedData) {
                    // Mengonversi data dari string JSON menjadi objek JavaScript
                    let data = JSON.parse(storedData);

                    // Mendapatkan referensi tabel
                    let tableBody = document.querySelector('.table tbody');
                    let total = 0;
                    // Menghapus semua elemen dalam tbody sebelum menambahkan data baru
                    tableBody.innerHTML = '';

                    // Iterasi melalui setiap objek data dan menambahkannya ke dalam tabel
                    data.forEach(item => {
                        let row = tableBody.insertRow();

                        // Menambahkan sel-sel dengan data produk
                        let cellNamaProduk = row.insertCell(0);
                        cellNamaProduk.textContent = item.nama_produk;
                        let cellHarga = row.insertCell(1);
                        cellHarga.textContent = formatRupiah(item.harga);

                        let cellJumlah = row.insertCell(2);
                        cellJumlah.textContent = item.jumlah;

                        let cellTotal = row.insertCell(3);
                        cellTotal.textContent = formatRupiah(item.total);
                        total += item.total;
                        // Menambahkan tombol hapus untuk setiap baris
                        let cellAksi = row.insertCell(4);
                        let deleteButton = document.createElement('a');
                        deleteButton.href = 'javascript:void(0)';
                        deleteButton.className = 'btn btn-primary btn-sm';
                        deleteButton.textContent = 'X';
                        deleteButton.addEventListener('click', function() {
                            total -= item.total;
                            // Hapus item dari localStorage dan perbarui tampilan tabel
                            data.splice(data.indexOf(item), 1);
                            localStorage.setItem('cart', JSON.stringify(data));
                            showDataInTable();
                        });
                        cellAksi.appendChild(deleteButton);
                    });
                    $('#total').html(formatRupiah(total));
                }
            }

            $('.btnPesan').on('click', function() {
                let storedData = localStorage.getItem('cart');
                let data = storedData ? JSON.parse(storedData) : [];
                let nama = $('#nama').val();
                let bank_id = $('#bank_id').val();
                let nomor_telepon = $('#nomor_telepon').val();
                let alamat = $('#alamat').val();
                console.log(nomor_telepon);
                $.ajax({
                    url: "{{ route('checkout') }}",
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        details: data,
                        nama: nama,
                        bank_id: bank_id,
                        nomor_telepon: nomor_telepon,
                        alamat: alamat
                    },
                    success: function(res) {
                        if (res.status) {
                            var item = localStorage.getItem('cart');
                            if (item) {
                                localStorage.removeItem('cart');
                            } else {
                                console.log('Item tidak ditemukan di localStorage');
                            }

                            let route_transaksi = '{{ route('transaksi.index') }}';
                            window.location.href =
                                route_transaksi
                        } else {
                            alert('Isi terlebih dahulu!');
                        }
                    }
                });
            });

            showDataInTable();
        });
    </script>
@endpush
