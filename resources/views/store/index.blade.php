@extends('menu')

@section('container')

<h4 class="mt-5 text-center">Data Store</h4>
<a href="{{ route('store.create') }}" type="button" class="btn btn-info rounded-3">Add Store</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">ID Store</th>
        <th class="text-center">Nama Store</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr class="text-center">
                <td>{{$loop->iteration}}</td>
                <td>{{ $data->id_store }}</td>
                <td>{{ $data->nama_store }}</td>
                <td>
                <a href="{{ route('store.edit', $data->id_store) }}" type="button" class="btn btn-warning rounded-3">Change</a>
                <form action="{{route ('store.delete', $data->id_store)}}" method="post" class="d-inline">
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
