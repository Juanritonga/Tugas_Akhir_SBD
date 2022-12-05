@extends('menu')

@section('container')

<h4 class="mt-5">Data Gudang</h4>
<a href="{{ route('gudang.create') }}" type="button" class="btn btn-success rounded-3">Tambah Gudang</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <!-- <th>ID gudang</th> -->
        <th>Nama Gudang</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->id_gudang }}</td>
                <td>{{$data->nama_gudang }}</td>
                <td>
                <a href="{{ route('gudang.edit', $data->id_gudang) }}" type="button" class="btn btn-warning rounded-3">Change</a>
                <form action="{{route ('gudang.delete', $data->id_gudang)}}" method="post" class="d-inline">
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