@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard 

@endsection

@section('content')
@include('layouts._flash')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Buku
                    <a href="{{route('barang.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Penulis</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="barang">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($barang as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->kategori->nama_kategori}}</td>
                                <td>{{$data->nama_barang}}</td>
                                <td><img src="{{$data->image()}}" alt="" style="width:150px; height:150px;" alt="Cover"></td>
                                <td>{{$data->harga}}</td>
                                <td>{{$data->stok}}</td>
                                <td>
                                    <form action="{{ route('barang.destroy', $data->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{(route('barang.edit', $data->id))}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{(route('barang.show', $data->id))}}" class="btn btn-outline-warning">Show</a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus ini?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('css')
<link rel="stylesheet" href="{{asset ('DataTables/datatables.min.css')}}">
@endsection

@section('js')
<script src="{{ asset ('DataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#barang').DataTable();
    });
</script>
@endsection