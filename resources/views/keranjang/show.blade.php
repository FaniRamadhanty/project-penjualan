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
                   <form action="{{route('keranjang.update',$keranjang->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Produk</label>
                            <select name="produk" class="form-control @error('produk') is-invalid @enderror" disabled>
                                @foreach($barang as $data)
                                    <option value="{{$data->id}}" {{$data->id == $keranjang->produk ? 'selected="selected"' : '' }}>{{$data->nama_barang}}</option>
                                @endforeach
                            </select>
                            @error('produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Total Harga</label>
                            <input type="text" name="total_harga" value="{{$keranjang->total_harga}}" class="form-control @error('total_harga') is-invalid @enderror"disabled>
                             @error('total_harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Produk</label>
                            <input type="number" name="jumlah_produk" value="{{$keranjang->jumlah_produk}}" class="form-control @error('jumlah_produk') is-invalid @enderror"disabled>
                             @error('jumlah_produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="form-group">
                        <a href="{{(route('keranjang.index'))}}" class="btn btn-outline-warning">Kembali</a>
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