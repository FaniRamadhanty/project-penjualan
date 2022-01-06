<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan "
            ]);
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('kategori.create');
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
            'nama_kategori' => 'required',
        ]);
        
        $kategori =  new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect()->route('kategori.index');
        
                $this->validate($request, ['nama_kategori' => 'required']);
                $kategori = Kategori::create($request->all());
                Session::flash("flash_notification", [
                                "level"=>"success",
                                "message"=>"Berhasil menyimpan"
                                ]);
                return redirect()->route('kategori.index');
            }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit')->with(compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    //validasi data
$validated = $request->validate([
    'nama_kategori' => 'required',
]);

$kategori = Kategori::findOrFail($id);
$kategori->nama_kategori = $request->nama_kategori;
$kategori->save();
return redirect()->route('kategori.index');

         $this->validate($request, ['nama_kategori' => 'required'. $id]);
         $kategori = Kategori::find($id);
         $kategori->update($request->only('nama_kategori'));
         Session::flash("flash_notification", [
         "level"=>"success",
         "message"=>"Berhasil menyimpan"
         ]);
         return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Kategori::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Penulis berhasil dihapus"
        ]);
        return redirect()->route('kategori.index');
    }
}
