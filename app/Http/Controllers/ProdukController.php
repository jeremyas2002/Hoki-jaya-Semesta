<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('frontend.pages.produk.index', [
            'title' => 'Produk Pilihan',
            'items' => Produk::latest()->get()
        ]);
    }

    public function show($slug)
    {
        $item = Produk::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.produk.show', [
            'title' => $item->judul,
            'item' => $item
        ]);
    }
}
