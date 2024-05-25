@extends('layouts.index')

@section('title', 'Form Data Barang')

@section('content')
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Data Barang</h1>
    </div>


    <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
        <form action="{{ route('barang-store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="kode_barang" class="form-label">Kode Barang <span>*</span></label>
                <input type="text" class="form-control input " id="kode_barang" name="kode_barang"
                    placeholder="Masukkan Kode Barang" required>
            </div>
            <div class="mb-4">
                <label for="jenis_barang_id" class="form-label">Kode Jenis<span>*</span></label>
                <select class="form-control input" id="jenis_barang_id" name="jenis_barang_id">
                    <option value="" disabled selected id="defautlSelect">Pilih Kode Jenis Barang
                    </option>
                    @foreach ($jenisBarang as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_jenis_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="nama_barang" class="form-label">Nama Barang <span>*</span></label>
                <input type="text" class="form-control input " id="nama_barang" name="nama_barang"
                    placeholder="Masukkan Nama Barang" required>
            </div>
            <div class="mb-4">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" class="form-control input " id="harga_jual" name="harga_jual"
                    placeholder="Masukkan Harga Jual" required>
            </div>
            <div class="mb-4">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="text" class="form-control input " id="harga_beli" name="harga_beli"
                    placeholder="Masukkan Harga Beli" required>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
        </form>
    </div>

</div>
@endsection
