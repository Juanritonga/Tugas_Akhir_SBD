@extends('menu')

@section('container')

<h4 class="mt-5">Data Barang</h4>
<a href="{{ route('barang.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table id="table_id" class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stock</th>  
        <th>ID Gudang</th>
        <th>ID Store</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->id_barang }}</td>
                <td>{{ $data->nama_barang }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->stock }}</td>
                <td>{{ $data->id_gudang }}</td>
                <td>{{ $data->id_store }}</td>
                <td>
                <a href="{{ route('barang.edit', $data->id_barang) }}" type="button" class="btn btn-warning rounded-3">Change</a>
                <a href="{{ route('barang.show', $data->id_barang) }}" type="button" class="btn btn-success rounded-3">Show</a>
                <form action="{{route ('barang.softDelete', $data->id_barang)}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Upps, Are you sure ?')">Delete</button>
                </form>
            </tr>
            @endforeach
    </tbody>
</table>
@stop