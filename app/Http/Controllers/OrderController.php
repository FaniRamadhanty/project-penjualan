<?php

namespace App\Http\Controllers;
use App\Models\Keranjang;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::with('keranjang')->get();
        return view('order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $keranjang =  Keranjang::all();
        return view('order.create', compact('keranjang'));
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
            'id_user'=>'required',
            'nama'=>'required',
            'telepon'=>'required',
            'alamat1'=>'required',
            'alamat2'=>'required',
        ]);
    
            $order =  new Order;
            $order->id_user = $request->id_user;
            $order->nama = $request->nama;  
            $order->telepon = $request->telepon;
            $order->alamat1 = $request->alamat1;
            $order->alamat2 = $request->alamat2;
            $order->save();
            return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $keranjang = Keranjang::all();
        return view('order.show', compact('order', 'keranjang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $keranjang = Keranjang::all();
        return view('order.edit', compact('order', 'keranjang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'id_user' => 'required',
            'nama' => 'required',
            'telepon' => 'required',
            'alamat1' => 'required',
            'alamat2' => 'required',
        ]);

        $order = Order::findOrFail($id);
        $order->id_user = $request->id_user;
        $order->nama = $request->nama;
        $order->telepon = $request->telepon;
        $order->alamat1 = $request->alamat1;
        $order->alamat2 = $request->alamat2;
        $order->save();
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('order.index');
    }
}
