<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $items = Produk::orderBy('nama', 'ASC')->get();
        return view('admin.pages.produk.index', [
            'title' => 'Data Produk',
            'items' => $items
        ]);
    }


    public function create()
    {
        return view('admin.pages.produk.create', [
            'title' => 'Tambah Data'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama' => ['required', 'unique:produk,nama'],
            'deskripsi' => ['required'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'gambar' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048']
        ]);

        $data = request()->all();
        $data['gambar'] = request()->file('gambar')->store('produk', 'public');
        $data['slug'] = \Str::slug(request('nama'));
        Produk::create($data);
        return redirect()->route('admin.produk.index')->with('success', 'Data Produk berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = Produk::findOrFail($id);
        return view('admin.pages.produk.show', [
            'title' => 'Detail Produk ' . $item->nama,
            'item' => $item
        ]);
    }


    public function edit($id)
    {
        $item = Produk::findOrFail($id);
        return view('admin.pages.produk.edit', [
            'title' => 'Edit Data',
            'item' => $item
        ]);
    }


    public function update($id)
    {
        request()->validate([
            'nama' => ['required', 'unique:produk,nama,' . $id],
            'deskripsi' => ['required'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'gambar' => ['image', 'mimes:jpg,png,jpeg', 'max:2048']
        ]);

        $item = Produk::findOrFail($id);
        $data = request()->all();
        if (request()->file('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }
            $data['gambar'] = request()->file('gambar')->store('produk', 'public');
        } else {
            $data['gambar'] = $item->gambar;
        }
        $data['slug'] = \Str::slug(request('nama'));
        $item->update($data);
        return redirect()->route('admin.produk.index')->with('success', 'Data Produk berhasil berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Data Produk berhasil berhasil dihapus.');
    }
}
