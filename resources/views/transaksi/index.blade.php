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
                    <a href="{{route('transaksi.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Order</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="transaksi">
                           <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Waktu Bayar</th>
                                <th>Metode Bayar 1</th>
                                <th>Jumlah Bayar</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($transaksi as $data)
                            <tr>
                                <td>{{$no++}}</td>
                              
                                <td>{{$data->order->nama}}</td>
                                <td>{{$data->waktu_pembayaran}}</td>
                                <td>{{$data->metode_pembayaran}}</td>
                                <td>{{$data->jumlah_bayar}}</td>
                                <td>
                                    <form action="{{ route('transaksi.destroy', $data->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{(route('transaksi.edit', $data->id))}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{(route('transaksi.show', $data->id))}}" class="btn btn-outline-warning">Show</a>
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
        $('#transaksi').DataTable();
    });
</script>
@endsection