<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('frontend.pages.transaksi.index', [
            'title' => 'Riwayat Transaksi',
            'items' => Transaksi::where('user_id', auth()->id())->latest()->get()
        ]);
    }

    public function show($uuid)
    {
        return view('frontend.pages.transaksi.show', [
            'title' => 'Riwayat Transaksi',
            'item' => Transaksi::where('uuid', $uuid)->firstOrFail()
        ]);
    }
}
