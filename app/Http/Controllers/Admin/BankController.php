<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $items = Bank::orderBy('nama', 'ASC')->get();
        return view('admin.pages.bank.index', [
            'title' => 'Data Bank',
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
        return view('admin.pages.bank.create', [
            'title' => 'Tambah Bank'
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
            'nama' => ['required', 'unique:bank,nama'],
            'nomor_rekening' => ['required', 'numeric'],
            'pemilik' => ['required']
        ]);

        $data = request()->all();
        Bank::create($data);
        return redirect()->route('admin.bank.index')->with('success', 'Bank berhasil ditambahkan.');
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
        $item = Bank::findOrFail($id);
        return view('admin.pages.bank.edit', [
            'title' => 'Edit Bank',
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
            'nama' => ['required', 'unique:bank,nama,' . $id],
            'nomor_rekening' => ['required', 'numeric'],
            'pemilik' => ['required']
        ]);

        $item = Bank::findOrFail($id);
        $data = request()->all();
        $item->update($data);
        return redirect()->route('admin.bank.index')->with('success', 'Bank berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Bank::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.bank.index')->with('success', 'Bank berhasil dihapus.');
    }
}
