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
                    <a href="{{route('order.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Order</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="order">
                           <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Alamat 1</th>
                                <th>Alamat 2</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($order as $data)
                            <tr>
                                <td>{{$no++}}</td>
                              
                                <td>{{$data->nama}}</td>
                                <td>{{$data->telepon}}</td>
                                <td>{{$data->alamat1}}</td>
                                <td>{{$data->alamat2}}</td>
                                <td>
                                    <form action="{{ route('order.destroy', $data->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{(route('order.edit', $data->id))}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{(route('order.show', $data->id))}}" class="btn btn-outline-warning">Show</a>
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
        $('#order').DataTable();
    });
</script>
@endsection