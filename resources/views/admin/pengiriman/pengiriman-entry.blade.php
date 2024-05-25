@extends('layouts.index')

@section('title', 'Form Data Pengiriman')

@section('content')
    <div class="container-fluid mt-5">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Data Pengiriman</h1>
        </div>


        <div class="form-add p-4 bg-white rounded-5 shadow mb-5">
            <form action="{{ route('pengiriman-store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="kode_pengiriman" class="form-label">Kode Pengiriman <span>*</span></label>
                    <input type="text" class="form-control input " id="kode_pengiriman" name="kode_pengiriman"
                        placeholder="Masukkan Kode Pengiriman" required>
                </div>
                <div class="mb-4">
                    <label for="gudang_id" class="form-label">Kode Gudang <span>*</span></label>
                    <select class="form-control input" id="gudang_id" name="gudang_id">
                        <option value="" disabled selected id="defautlSelect">Pilih Kode Gudang
                        </option>
                        @foreach ($gudang as $data)    
                        <option value="{{ $data->id }}">{{ $data->kode_gudang }}</option>
                        @endforeach
                    </select>
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
                    <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control input " id="jumlah_barang" name="jumlah_barang"
                        placeholder="Masukkan Jumlah Barang" required>
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
