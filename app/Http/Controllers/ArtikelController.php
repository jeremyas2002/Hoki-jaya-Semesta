<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('frontend.pages.artikel.index', [
            'title' => 'Artikel Pilihan',
            'items' => Artikel::where('status', 1)->latest()->get()
        ]);
    }

    public function show($slug)
    {
        $item = Artikel::where('slug', $slug)->firstOrFail();
        return view('frontend.pages.artikel.show', [
            'title' => $item->judul,
            'item' => $item
        ]);
    }
}
