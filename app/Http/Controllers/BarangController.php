<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Kategori;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::with('kategori')->get();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan "
            ]);
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori =  Kategori::all();
        return view('barang.create', compact('kategori'));
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
        'id_kategori'=>'required',
        'nama_barang'=>'required',
        'cover'=>'required|image|max:2048',
        'harga'=>'required',
        'stok'=>'required'
    ]);

        $barang =  new Barang;
        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        // upload image / foto
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/barang/', $name);
            $barang->cover = $name;
        }
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->save();
        return redirect()->route('barang.index');

        $this->validate($request, ['id_kategorii' => 'required']);
        $barang = barang::create($request->all());
        Session::flash("flash_notification", [
                        "level"=>"success",
                        "message"=>"Berhasil menyimpan"
                        ]);
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        return view('barang.show', compact('barang', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        // upload image / foto
        if ($request->hasFile('cover')) {
            $barang->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/barang/', $name);
            $barang->cover = $name;
        }
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->save();
        return redirect()->route('barang.index');

        $this->validate($request, ['id_kategori' => 'required'. $id]);
        $barang = Barang::find($id);
        $barang->update($request->only('id_kategori'));
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan"
        ]);
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Barang::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Barang berhasil dihapus"
        ]);
        return redirect()->route('barang.index');
    }
}
