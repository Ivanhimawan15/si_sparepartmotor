@extends('layouts.index')

@section('title', 'Form Data Jenis Barang')

@section('content')
    <div class="container-fluid mt-5">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Data Jenis Barang</h1>
        </div>


        <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
            <form action="{{ route('jenis-barang-store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="kode_jenis_barang" class="form-label">Kode Jenis <span>*</span></label>
                    <input type="text" class="form-control input " id="kode_jenis_barang" name="kode_jenis_barang"
                        placeholder="Masukkan Kode Jenis" required>
                </div>
                <div class="mb-4">
                    <label for="nama_jenis_barang" class="form-label">Nama Jenis Barang <span>*</span></label>
                    <input type="text" class="form-control input " id="nama_jenis_barang" name="nama_jenis_barang"
                        placeholder="Masukkan Nama Jenis Barang" required>
                </div>
                <div class="mb-4">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control input " id="keterangan" name="keterangan"
                        placeholder="Masukkan Keterangan Barang" required>
                </div>

                <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
            </form>
        </div>

    </div>
@endsection
