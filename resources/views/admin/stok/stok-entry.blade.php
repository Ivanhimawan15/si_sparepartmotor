@extends('layouts.index')

@section('title', 'Form Data Stok')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Data Stok</h1>
    </div>

    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('stok-store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="kode_stok" class="form-label">Kode Stok <span>*</span></label>
                <input type="text" class="form-control input" id="kode_stok" name="kode_stok"
                    placeholder="Masukkan Kode Stok" required>
            </div>
            <div class="mb-4">
                <label for="barang_id" class="form-label">Kode Barang <span>*</span></label>
                <select class="form-control input" id="barang_id" name="barang_id">
                    <option value="" disabled selected id="defautlSelect">Pilih Kode Barang
                    </option>
                    @foreach ($barang as $data)
                    <option value="{{ $data->id }}">{{ $data->kode_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="jumlah_stok" class="form-label">Jumlah Stok Barang</label>
                <input type="number" class="form-control input " id="jumlah_stok" name="jumlah_stok"
                    placeholder="Masukkan Jumlah Stok Barang" required value="">
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
    </div>

</div>
@endsection
