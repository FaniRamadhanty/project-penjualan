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
                   <form action="{{route('order.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Id User</label>
                            <select name="id_user" class="form-control @error('id_user') is-invalid @enderror" >
                                @foreach($keranjang as $data)
                                    <option value="{{$data->id}}">{{$data->produk}}</option>
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
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                             @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Telepon</label>
                            <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror">
                             @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat 1</label>
                            <textarea type="text" name="alamat1" class="form-control @error('alamat1') is-invalid @enderror"></textarea>
                             @error('alamat1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat 2</label>
                            <textarea type="text" name="alamat2" class="form-control @error('alamat2') is-invalid @enderror"></textarea>
                             @error('alamat2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
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