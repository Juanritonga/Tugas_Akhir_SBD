@extends('menu')

@section('container')

<h4 class="mt-5 text-center">Data Barang</h4>
<a href="{{ route('barang.create') }}" type="button" class="btn btn-info rounded-3 mb-3">Add Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table id="table_id" class="table table-hover mt-2">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">ID Barang</th>
        <th class="text-center">Nama Barang</th>
        <th class="text-center">Harga</th>
        <th class="text-center">Stock</th>
        <th class="text-center">ID Gudang</th>
        <th class="text-center">ID Store</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr class="text-center">
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->id_barang }}</td>
                <td>{{ $data->nama_barang }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->stock }}</td>
                <td>{{ $data->id_gudang }}</td>
                <td>{{ $data->id_store }}</td>
                <td class="text-center">
                <a href="{{ route('barang.show', $data->id_barang) }}" type="button" class="btn btn-primary rounded-3">Show</a>
                <a href="{{ route('barang.edit', $data->id_barang) }}" type="button" class="btn btn-warning rounded-3">Change</a>
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
