@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard 

@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Buku</div>
                <div class="card-body">
                   <form action="{{route('barang.update',$barang->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <select name="id_kategori" value="{{$barang->id_kategori}}" class="form-control @error('id_kategori') is-invalid @enderror" >
                                @foreach($kategori as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kategori}}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{$barang->nama_barang}}" class="form-control @error('nama_barang') is-invalid @enderror">
                             @error('nama_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Produk</label>
                            <br>
                            <img src="{{ $barang->image() }}" height="75" style="padding:10px;" />
                            <input type="file" name="cover" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" value="{{$barang->harga}}" class="form-control @error('nama_barang') is-invalid @enderror">
                             @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="number" name="stok" value="{{$barang->stok}}" class="form-control @error('nama_barang') is-invalid @enderror">
                             @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
            
@stop

@section('css')


@stop

@section('js')

@stop