@extends('menu')

@section('container')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Store</h5>

		<form method="post" action="{{ route('store.store') }}">
			@csrf
            <div class="mb-3">
                <label for="id_store" class="form-label">ID Store</label>
                <input type="text" class="form-control" id="id_store" name="id_store">
            </div>
			<div class="mb-3">
                <label for="nama_store" class="form-label">Nama Store</label>
                <input type="text" class="form-control" id="nama_store" name="nama_store">
            </div>
            <div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop