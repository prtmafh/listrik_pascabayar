@extends('admin.layout.app')

@section('title', 'Laporan Pembayaran Listrik')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Laporan Pembayaran Listrik</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.data_pengguna')}}">Laporan Pembayaran</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="mytable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center " style="width: 40px">No.</th>
                                        <th>No Kwh</th>
                                        <th>Nama Pengguna</th>
                                        <th>Daya</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Meter Awal</th>
                                        <th>Meter Akhir</th>
                                        <th>Pemakaian</th>
                                        <th>Biaya Admin</th>
                                        <th>Total Bayar</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Status</th>
                                        <th class="text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection