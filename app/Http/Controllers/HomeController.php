<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Post;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home', [
            'title' => 'Website Interior',
            'data_artikel' => Artikel::where('status', 1)->latest()->limit(3)->get(),
            'data_produk' => Produk::latest()->limit(3)->get()
        ]);
    }
}
