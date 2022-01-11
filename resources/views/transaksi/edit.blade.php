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
                   <form action="{{route('transaksi.update',$transaksi->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama</label>
                            <select name="id_transaksi"  value="{{$transaksi->id_transaksi}}" class="form-control @error('id_transaksi') is-invalid @enderror" >
                                @foreach($order as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @error('id_transaksi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Waktu Bayar</label>
                            <input type="date" name="waktu_pembayaran" value="{{$transaksi->waktu_pembayaran}}" class="form-control @error('waktu_pembayaran') is-invalid @enderror">
                             @error('waktu_pembayaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <select name="metode_pembayaran" value="{{$transaksi->metode_pembayaran}}" class="form-control @error('metode_pembayaran') is-invalid @enderror" >
                                <option value="COD"selected="selected">COD</option>
                                <option value="BCA">BCA</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>                               
                                <option value="Mandiri">Mandiri</option>
                            </select>
                             @error('metode_pembayaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Bayar</label>
                            <input type="text" name="jumlah_bayar" value="{{$transaksi->jumlah_bayar}}"  placeholder="Rp." class="form-control @error('jumlah_bayar') is-invalid @enderror">
                             @error('jumlah_bayar')
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