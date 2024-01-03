<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $nama = request('nama');
            $nomor_telepon = request('nomor_telepon');
            $bank_id = request('bank_id');
            $alamat = request('alamat');
            $details = request('details');

            DB::beginTransaction();
            try {
                $total_bayar = 0;
                foreach ($details as $detail) {
                    $produk = Produk::findOrFail($detail['id']);
                    $jumlah = $detail['jumlah'];
                    $harga = $produk->harga;
                    $totalProduk = $jumlah * $harga;
                    $total_bayar += $totalProduk;
                }
                $data_transaksi = [
                    'kode' => Transaksi::getKodeBaru(),
                    'uuid' => \Str::uuid(),
                    'nama' => $nama,
                    'nomor_telepon' => $nomor_telepon,
                    'bank_id' => $bank_id,
                    'alamat' => $alamat,
                    'total' => $total_bayar,
                    'user_id' => auth()->id(),
                    'status' => 0
                ];
                $transaksi = Transaksi::create($data_transaksi);
                foreach ($details as $detail) {
                    // Produk
                    $produk = Produk::findOrFail($detail['id']);

                    // Jumlah, catatan, dan harga
                    $jumlah = $detail['jumlah'];
                    $catatan = $detail['catatan'];
                    $harga = $produk->harga;

                    // Perhitungan total untuk satu produk
                    $total = $jumlah * $harga;

                    // Menambahkan detail transaksi
                    $transaksi->details()->create([
                        'produk_id' => $produk->id,
                        'jumlah' => $jumlah,
                        'harga' => $harga,
                        'total' => $total,
                        'catatan' => $catatan
                    ]);
                }

                DB::commit();
                return response()->json([
                    'status' => true,
                    'pesan' => 'Berhasil memesan barang'
                ]);
            } catch (\Throwable $th) {
                // throw $th;
                return response()->json([
                    'status' => false,
                    'pesan' => $th->getMessage()
                ]);
            }
        }
    }
}
