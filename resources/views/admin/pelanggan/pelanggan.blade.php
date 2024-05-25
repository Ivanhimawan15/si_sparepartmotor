@extends('layouts.index')

@section('title', 'Data Pelanggan')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid mt-5">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pelanggan</h1>
            <div class="d-flex">
                <a href="#" class="d-flex align-items-center btn-sm btn-success shadow-sm mr-4 px-3 py-2"><i
                        class="far fa-clipboard fa-sm text-white mr-2"></i> Generate Report</a>
                <a href="{{ route('pelanggan-entry') }}"
                    class="d-flex align-items-center btn-sm btn-primary shadow-sm px-3 py-2""><i
                        class="fas fa-plus fa-sm text-white mr-2"></i> Add Data</a>
            </div>

        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Pelanggan</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th>Jenis Pelanggan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>P001</td>
                                <td>Bambang Pamungkas</td>
                                <td>Malang</td>
                                <td>0816254536212</td>
                                <td>Gold</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
