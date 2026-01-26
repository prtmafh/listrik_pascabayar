@extends('pelanggan.layout.app')

@section('title', 'Riwayat Pembayaran Listrik')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Riwayat Pembayaran Listrik</h3>
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
                            <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center " style="width: 40px">No.</th>
                                            <th>No Kwh</th>
                                            <th>Daya</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Meter Awal</th>
                                            <th>Meter Akhir</th>
                                            <th>Pemakaian</th>
                                            <th>Biaya Admin</th>
                                            <th>Total Bayar</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center ">1</td>
                                            <td>1234567890</td>
                                            <td>1300 VA</td>
                                            <td>2024</td>
                                            <td>Januari</td>
                                            <td>1000</td>
                                            <td>1200</td>
                                            <td>200</td>
                                            <td>Rp 5.000,-</td>
                                            <td>Rp 305.000,-</td>
                                            <td>15 Januari 2024</td>
                                            <td><span class="badge bg-success">Lunas</span></td>
                                        </tr>


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection