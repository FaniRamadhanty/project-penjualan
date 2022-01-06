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
                   <form action="{{route('order.update',$order->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Id User</label>
                            <select name="id_user" class="form-control @error('id_user') is-invalid @enderror" disabled>
                                @foreach($keranjang as $data)
                                    <option value="{{$data->id}}" {{$data->id == $keranjang->produk ? 'selected="selected"' : '' }}>{{$data->produk}}</option>
                                @endforeach
                            </select>
                            @error('id_user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" value="{{$order->nama}}" class="form-control @error('nama) is-invalid @enderror"disabled>
                             @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Telepon</label>
                            <input type="text" name="telepon" value="{{$order->telepon}}" class="form-control @error('telepon') is-invalid @enderror"disabled>
                             @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label for="">alamat 1</label>
                            <textarea type="textarea" name="alamat1" value="{{$order->alamat1}}" class="form-control @error('alamat1') is-invalid @enderror"disabled></textarea>
                             @error('alamat1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>   
                        <div class="form-group">
                            <label for="">Alamat 2</label>
                            <textarea type="textarea" name="alamat2" value="{{$order->alamat2}}" class="form-control @error('alamat2') is-invalid @enderror"disabled></textarea>
                             @error('alamat2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="form-group">
                        <a href="{{(route('order.index'))}}" class="btn btn-outline-warning">Kembali</a>
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