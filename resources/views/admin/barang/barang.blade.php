@extends('layouts.index')

@section('title', 'Data Barang')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
        <div class="d-flex">
            <a href="{{ route('report-barang') }}" class="d-flex align-items-center btn-sm btn-success shadow-sm mr-4 px-3 py-2"><i
                    class="far fa-clipboard fa-sm text-white mr-2"></i> Generate Report</a>
            <a href="{{ route('barang-entry') }}"
                class="d-flex align-items-center btn-sm btn-primary shadow-sm px-3 py-2""><i
                        class=" fas fa-plus fa-sm text-white mr-2"></i> Add Data</a>
        </div>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Kode Barang</th>
                            <th>Jenis Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse ($barang as $data)
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->kode_barang }}</td>
                            @foreach ($jenisBarang as $jenis)
                            <td>{{ $jenis->nama_jenis_barang }}</td>
                            @endforeach
                            <td>{{ $data->nama_barang }}</td>
                            <td>{{ $data->harga_jual }}</td>
                            <td>{{ $data->harga_beli }}</td>
                            <td class="d-flex align-items-center justify-content-center">
                                <button class="btn btn-primary px-4 mr-3" data-toggle="modal"
                                    data-target="#target{{ $data->id }}">
                                    Edit
                                </button>
                                <button type="submit" class="btn btn-danger delete-btn" data-toggle="modal"
                                    data-target="#delete{{ $data->id }}">Delete</button>
                            </td>
                        </tr>
                        {{-- Modal Edit --}}
                        <div class="modal fade" id="target{{ $data->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('barang-update',['id' => $data->id]) }}"
                                            method="post">
                                            @csrf
                                            <div class="mb-4">
                                                <label for="kode_barang" class="form-label">Kode Barang <span>*</span></label>
                                                <input type="text" class="form-control input " id="kode_barang" name="kode_barang"
                                                    placeholder="Masukkan Kode Barang" required value="{{ $data->kode_barang }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="jenis_barang_id" class="form-label">Kode Jenis<span>*</span></label>
                                                <select class="form-control input" id="jenis_barang_id" name="jenis_barang_id">
                                                    <option value="" disabled selected id="defautlSelect">Pilih Kode Jenis Barang
                                                    </option>
                                                    @foreach ($jenisBarang as $jenis)
                                                    <option value="{{ $jenis->id }}" {{ $data->jenis_barang_id == $jenis->id ? 'selected' : ''}}>{{ $jenis->nama_jenis_barang }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label for="nama_barang" class="form-label">Nama Barang <span>*</span></label>
                                                <input type="text" class="form-control input " id="nama_barang" name="nama_barang"
                                                    placeholder="Masukkan Nama Barang" required value="{{ $data->nama_barang }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="harga_jual" class="form-label">Harga Jual</label>
                                                <input type="number" class="form-control input " id="harga_jual" name="harga_jual"
                                                    placeholder="Masukkan Harga Jual" required value="{{ $data->harga_jual }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="harga_beli" class="form-label">Harga Beli</label>
                                                <input type="text" class="form-control input " id="harga_beli" name="harga_beli"
                                                    placeholder="Masukkan Harga Beli" required value="{{ $data->harga_beli }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary py-2 px-5 rounded-3 w-100">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Edit --}}

                        {{-- Modal Delete --}}
                        <div class="modal delete fade" id="delete{{ $data->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div
                                        class="modal-body d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('img/ask.png') }}" width="300">
                                        <h1 class="fs-5 text-center fw-bold">Are you sure wan't to delete this data?
                                        </h1>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary border-0" data-bs-dismiss="modal"
                                            style="background-color: #d33">No</button>
                                        <form action="{{ route('barang-delete', ['id' => $data->id]) }}"
                                            method="delete">
                                            @csrf
                                            <button type="submit" class="btn btn-primary border-0 px-4"
                                                style="background-color: #3085d6">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Delete --}}
                        @empty
                        <tr>
                            <td colspan="7" align="center">Tidak Ada Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
