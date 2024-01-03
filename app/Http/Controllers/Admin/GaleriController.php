<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $items = Galeri::latest()->get();
        return view('admin.pages.galeri.index', [
            'title' => 'Data Galeri',
            'items' => $items
        ]);
    }


    public function create()
    {
        return view('admin.pages.galeri.create', [
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
            'judul' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048']
        ]);

        $data = request()->all();
        $data['gambar'] = request()->file('gambar')->store('galeri', 'public');
        Galeri::create($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Data Galeri berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = Galeri::findOrFail($id);
        return view('admin.pages.galeri.show', [
            'title' => 'Detail Galeri ' . $item->judul,
            'item' => $item
        ]);
    }


    public function edit($id)
    {
        $item = Galeri::findOrFail($id);
        return view('admin.pages.galeri.edit', [
            'title' => 'Edit Data',
            'item' => $item
        ]);
    }


    public function update($id)
    {
        request()->validate([
            'judul' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['image', 'mimes:jpg,png,jpeg', 'max:2048']
        ]);

        $item = Galeri::findOrFail($id);
        $data = request()->all();
        if (request()->file('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }
            $data['gambar'] = request()->file('gambar')->store('galeri', 'public');
        } else {
            $data['gambar'] = $item->gambar;
        }
        $item->update($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Data Galeri berhasil berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Galeri::findOrFail($id)->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Data Galeri berhasil berhasil dihapus.');
    }
}
