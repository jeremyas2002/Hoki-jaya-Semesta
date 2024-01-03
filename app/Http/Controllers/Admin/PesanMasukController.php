<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanMasuk;
use Illuminate\Http\Request;

class PesanMasukController extends Controller
{
    public function index()
    {
        $items = PesanMasuk::latest()->get();
        return view('admin.pages.pesan-masuk.index', [
            'title' => 'Data Pesan Masuk',
            'items' => $items
        ]);
    }

    public function destroy($id)
    {
        $item = PesanMasuk::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.pesan-masuk.index')->with('success', 'Pesan Masuk berhasil dihapus.');
    }
}
