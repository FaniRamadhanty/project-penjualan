<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function tampil ()
    {
        $barang = Barang::all();
        return view('bagian.tampilan', compact('barang'));
    }
}
