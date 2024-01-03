<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        return view('frontend.pages.galeri.index', [
            'title' => 'Galeri',
            'items' => Galeri::latest()->get()
        ]);
    }

    public function show($id)
    {
        $item = Galeri::where('id', $id)->firstOrFail();
        return view('frontend.pages.galeri.show', [
            'title' => $item->judul,
            'item' => $item
        ]);
    }
}
