@extends('menu')

@section('container')

<h4 class="mt-5 text-center">Data Gudang</h4>
<a href="{{ route('gudang.create') }}" type="button" class="btn btn-info rounded-3">Add Gudang</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">ID gudang</th>
        <th class="text-center">Nama Gudang</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr class="text-center">
                <td>{{$loop->iteration}}</td>
                <td>{{$data->id_gudang }}</td>
                <td>{{$data->nama_gudang }}</td>
                <td>
                <a href="{{ route('gudang.edit', $data->id_gudang) }}" type="button" class="text-center btn btn-warning rounded-3">Change</a>
                <form action="{{route ('gudang.delete', $data->id_gudang)}}" method="post" class="text-center d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Upps, Are you sure?')">Delete</button>
                </form>
                </td>
            </tr>
        @endforeach

            </td>
        </tr>
    </tbody>
</table>
@stop
