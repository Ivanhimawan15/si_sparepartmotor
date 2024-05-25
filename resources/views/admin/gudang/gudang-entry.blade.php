@extends('layouts.index')

@section('title', 'Form Data Gudang')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Data Gudang</h1>
    </div>

    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('gudang-store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="kode_gudang" class="form-label">Kode Gudang <span>*</span></label>
                <input type="text" class="form-control input " id="kode_gudang" name="kode_gudang"
                    placeholder="Masukkan Kode Gudang" required>
            </div>
            <div class="mb-4">
                <label for="stok_barang_id" class="form-label">ID Stok <span>*</span></label>
                <select class="form-control input" id="stok_barang_id" name="stok_barang_id">
                    <option value="" disabled selected id="defautlSelect">Pilih Kode Stok
                    </option>
                    @foreach ($stok as $data)
                    <option value="{{ $data->id }}">{{ $data->kode_stok }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="barang_id" class="form-label">Kode Barang <span>*</span></label>
                <select class="form-control input" id="barang_id" name="barang_id">
                    <option value="" disabled selected id="defautlSelect">Pilih Kode Barang
                    </option>
                    @foreach ($barang as $item)
                    <option value="{{ $item->id }}">{{ $item->kode_barang }}</option>
                    @endforeach
                </select>
              
            </div>
            <div class="mb-4">
                <label for="tanggal" class="form-label">Tanggal <span>*</span></label>
                <input type="date" class="form-control input " id="tanggal" name="tanggal" required>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
    </div>

</div>
@endsection
