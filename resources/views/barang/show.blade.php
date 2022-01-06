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
                            <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" disabled>
                                @foreach($kategori as $data)
                                    <option value="{{$data->id}}" {{$data->id == $barang->id_kategori ? 'selected="selected"' : '' }}>{{$data->nama_kategori}}</option>
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
                            <input type="text" name="nama_barang" value="{{$barang->nama_barang}}" class="form-control @error('nama_barang') is-invalid @enderror"disabled>
                             @error('nama_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Produk</label>
                            <br>
                            <img src="{{ $barang->image() }}" height="75" style="padding:10px;" disabled/>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" value="{{$barang->harga}}" class="form-control @error('harga') is-invalid @enderror"disabled>
                             @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  <div class="form-group">
                            <label for="">Stok</label>
                            <input type=" number" name="stok" value="{{$barang->stok}}" class="form-control @error('stok') is-invalid @enderror"disabled>
                             @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <a href="{{(route('barang.index'))}}" class="btn btn-outline-warning">Kembali</a>
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