<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ArtikelController extends Controller
{
    public function index()
    {
        $items = Artikel::latest()->get();
        return view('admin.pages.artikel.index', [
            'title' => 'Data Artikel',
            'items' => $items
        ]);
    }


    public function create()
    {
        return view('admin.pages.artikel.create', [
            'title' => 'Tambah Data',
            'data_kategori' => Kategori::orderBy('nama', 'ASC')->get(),
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
            'judul' => ['required', 'unique:artikel,judul'],
            'kategori_id' => ['required'],
            'status' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'deskripsi_singkat' => ['required', 'max:255']
        ]);

        $data = request()->all();
        if (request()->file('gambar')) {
            $data['gambar'] = request()->file('gambar')->store('artikel', 'public');
        } else {
            $data['gambar'] = NULL;
        }
        $data['slug'] = \Str::slug(request('judul'));
        $data['user_id'] = auth()->id();
        $post = Artikel::create($data);
        return redirect()->route('admin.artikel.index')->with('success', 'Data Artikel berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = Artikel::with('kategori', 'user')->findOrFail($id);
        return view('admin.pages.artikel.show', [
            'title' => 'Detail Artikel ' . $item->judul,
            'item' => $item
        ]);
    }


    public function edit($id)
    {
        $item = Artikel::findOrFail($id);
        return view('admin.pages.artikel.edit', [
            'title' => 'Edit Data',
            'item' => $item,
            'data_kategori' => Kategori::orderBy('nama', 'ASC')->get()
        ]);
    }


    public function update($id)
    {
        $item = Artikel::findOrFail($id);
        request()->validate([
            'judul' => ['required', Rule::unique('artikel')->ignore($item->id)],
            'kategori_id' => ['required'],
            'status' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'deskripsi_singkat' => ['required', 'max:255']
        ]);

        $data = request()->all();
        if (request()->file('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }
            $data['gambar'] = request()->file('gambar')->store('artikel', 'public');
        } else {
            $data['gambar'] = $item->gambar;
        }
        $data['slug'] = \Str::slug(request('judul'));
        $item->update($data);
        return redirect()->route('admin.artikel.index')->with('success', 'Data Artikel berhasil berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artikel::findOrFail($id)->delete();
        return redirect()->route('admin.artikel.index')->with('success', 'Data Artikel berhasil berhasil dihapus.');
    }
}
