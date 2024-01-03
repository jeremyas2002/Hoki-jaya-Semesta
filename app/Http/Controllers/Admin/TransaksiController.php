<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $items = Transaksi::latest()->get();
        return view('admin.pages.transaksi.index', [
            'title' => 'Data Transaksi',
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
        return view('admin.pages.transaksi.create', [
            'title' => 'Tambah Transaksi'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaksi::with('details')->findOrFail($id);
        return view('admin.pages.transaksi.show', [
            'title' => 'Detail Transaksi',
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaksi::findOrFail($id);
        return view('admin.pages.transaksi.edit', [
            'title' => 'Edit Transaksi',
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
            'nomor_telepon' => ['required'],
            'alamat' => ['required'],
            'status' => ['required']
        ]);

        $item = Transaksi::findOrFail($id);
        $data = request()->only(['nama', 'nomor_telepon', 'alamat', 'status']);
        $item->update($data);
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaksi::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
