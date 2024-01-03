<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index()
    {
        $items = Testimoni::latest()->get();
        return view('admin.pages.testimoni.index', [
            'title' => 'Data Testimoni',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.testimoni.create', [
            'title' => 'Tambah Testimoni'
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
            'nama' => ['required'],
            'gambar' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'pesan' => ['required']
        ]);

        $data = request()->all();
        if (request()->file('gambar')) {
            $data['gambar']  = request()->file('gambar')->store('testimoni', 'public');
        } else {
            $data['gambar']  = NULL;
        }
        Testimoni::create($data);
        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Testimoni::findOrFail($id);
        return view('admin.pages.testimoni.edit', [
            'title' => 'Edit Testimoni',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama' => ['required'],
            'gambar' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'pesan' => ['required']
        ]);

        $data = request()->all();
        $item = Testimoni::findOrFail($id);
        if (request()->file('gambar')) {
            if ($item->gambar)
                Storage::disk('public')->delete($item->gambar);
            $data['gambar']  = request()->file('gambar')->store('testimoni', 'public');
        } else {
            $data['gambar']  = $item->gambar;
        }
        $item->update($data);
        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Testimoni::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
