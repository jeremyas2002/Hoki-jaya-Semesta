<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count = [
            'pelanggan' => User::where('role', 'pelanggan')->count(),
            'artikel' => Artikel::count(),
            'produk' => Produk::count(),
            'transaksi' => Transaksi::count()
        ];
        return view('admin.pages.dashboard', [
            'title' => 'Dashboard',
            'count' => $count,
        ]);
    }
}
