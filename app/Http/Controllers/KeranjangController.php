<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        return view('frontend.pages.keranjang', [
            'title' => 'Keranjang',
            'data_bank' => Bank::get()
        ]);
    }
}
