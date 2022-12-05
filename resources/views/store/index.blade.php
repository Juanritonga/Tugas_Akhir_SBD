@extends('menu')

@section('container')

<h4 class="mt-5">Data Store</h4>
<a href="{{ route('store.create') }}" type="button" class="btn btn-success rounded-3">Tambah Store</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>ID Store</th>
        <th>Nama Store</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->id_store }}</td>
                <td>{{ $data->nama_store }}</td>
                <td>
                <a href="{{ route('store.edit', $data->id_store) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>
                <form action="{{route ('store.delete', $data->id_store)}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Upps, Are you sure?')">Hapus</button>
                </form>
                </td>
            </tr>
        @endforeach
        
            </td>
        </tr>
    </tbody>
</table>
@stop