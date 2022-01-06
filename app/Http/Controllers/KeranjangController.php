<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjang = Keranjang::with('barang')->get();
        return view('keranjang.index', compact('keranjang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $barang =  Barang::all();
        return view('keranjang.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk'=>'required',
            'total_harga'=>'required',
            'jumlah_produk'=>'required',
        ]);
    
            $keranjang =  new Keranjang;
            $keranjang->produk = $request->produk;
            $keranjang->total_harga = $request->total_harga;  
            $keranjang->jumlah_produk = $request->jumlah_produk;
            $keranjang->save();
            return redirect()->route('keranjang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $barang = Barang::all();
        return view('keranjang.show', compact('keranjang', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $barang = Barang::all();
        return view('keranjang.edit', compact('keranjang', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'produk' => 'required',
            'total_harga' => 'required',
            'jumlah_produk' => 'required',
        ]);

        $keranjang = Keranjang::findOrFail($id);
        $keranjang->produk = $request->produk;
        $keranjang->total_harga = $request->total_harga;
        $keranjang->jumlah_produk = $request->jumlah_produk;
        $keranjang->save();
        return redirect()->route('keranjang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjang =Keranjang::findOrFail($id);
        $keranjang->delete();
        return redirect()->route('keranjang.index');
    }
}
