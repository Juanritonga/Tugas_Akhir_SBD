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

        <h5 class="card-title fw-bolder mb-3">Detail barang</h5>

			@csrf
            <div class="mb-3">
                <label for="id_barang" class="form-label">ID barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang" value="{{ $data->id_barang }}" readonly>
            </div>
			<div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Baranng</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $data->nama_barang }}" readonly>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}" readonly>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" value="{{ $data->stock }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_gudang" class="form-label">Nama Gudang</label>
                <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" value="{{ $data->nama_gudang }}" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_store" class="form-label">ID Store</label>
                <input type="text" class="form-control" id="nama_store" name="nama_store" value="{{ $data->nama_store }}" readonly>
            </div>
            <div class="text-center">
            <a href="{{ route('barang.index') }}" type="button" class="btn btn-primary rounded-3" >Back</a>
			</div>
            <!-- <a href="{{ route('barang.index') }}" type="button" class="btn btn-primary rounded-3 text-center" >Kembali</a> -->
		</form>
	</div>
</div>

@stop
