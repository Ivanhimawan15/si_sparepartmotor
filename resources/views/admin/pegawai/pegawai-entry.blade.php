@extends('layouts.index')

@section('title', 'Form Data Pegawai')

@section('content')
    <div class="container-fluid mt-5">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Data Pegawai</h1>
        </div>


        <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
            <form action="{{ route('pegawai-store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="kode_pegawai" class="form-label">Kode Pegawai <span>*</span></label>
                    <input type="text" class="form-control input " id="kode_pegawai" name="kode_pegawai"
                        placeholder="Masukkan Kode Pelanggan" required>
                </div>
                <div class="mb-4">
                    <label for="nama_pegawai" class="form-label">Nama Pegawai <span>*</span></label>
                    <input type="text" class="form-control input " id="nama_pegawai" name="nama_pegawai"
                        placeholder="Masukkan Nama Pelanggan" required>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control input id="alamat" name="alamat" rows="5" placeholder="Masukkan Alamat" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="no_telp" class="form-label">No. Telephone <span>*</span></label>
                    <input type="text" class="form-control input " id="no_telp" name="no_telp"
                        placeholder="Masukkan Nomor Telephone" required >
                </div>
                <div class="mb-4">
                    <label for="jabatan" class="form-label">Jabatan <span>*</span></label>
                    <input type="text" class="form-control input " id="jabatan" name="jabatan"
                        placeholder="Masukkan Jenis Pelanggan" required>
                </div>
                <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
            </form>
        </div>

    </div>
@endsection
