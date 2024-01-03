<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        return view('frontend.pages.testimoni', [
            'title' => 'Testimoni Pelanggan',
            'items' => Testimoni::latest()->get()
        ]);
    }
}
