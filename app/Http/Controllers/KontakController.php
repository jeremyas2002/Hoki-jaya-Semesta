<?php

namespace App\Http\Controllers;

use App\Models\PesanMasuk;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('frontend.pages.kontak', [
            'title' => 'Kontak Kami'
        ]);
    }

    public function store()
    {
        request()->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'subjek' => ['required'],
            'pesan' => ['required']
        ]);

        $data = request()->only(['nama', 'email', 'subjek', 'pesan']);
        PesanMasuk::create($data);
        return redirect()->back()->with('success', 'Terimakasih atas kritik dan saran yang anda berikan');
    }
}
