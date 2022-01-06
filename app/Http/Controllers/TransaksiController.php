<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::with('order')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order =  Order::all();
        return view('transaksi.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_transaksi'=>'required',
            'waktu_pembayaran'=>'required',
            'metode_pembayaran'=>'required',
            'jumlah_bayar'=>'required',
        ]);
    
            $transaksi =  new Transaksi;
            $transaksi->id_transaksi = $request->id_transaksi;
            $transaksi->waktu_pembayaran = $request->waktu_pembayaran;  
            $transaksi->metode_pembayaran = $request->metode_pembayaran;
            $transaksi->jumlah_bayar = $request->jumlah_bayar;
            $transaksi->save();
            return redirect()->route('transaksi.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }
}
