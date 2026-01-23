@extends('admin.layout.app')

@section('title', 'Penggunaan Listrik')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">Data Pengunaan Listrik</h3>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex justify-content-end gap-2">
                        <select name="bulan" class="form-control w-auto text-muted" required>
                            <option value="">Pilih Bulan</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                        <input type="text" name="tahun" class="form-control w-auto"
                            placeholder="Tahun (misal: 2025)" required>

                        <a href="#" class="btn btn-warning">
                            <i class="bi bi-gear"></i> Generate Penggunaan
                        </a>
                    </div>
                </div>

            </div>
            <!--end::Row-->
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
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Meter Awal</th>
                                        <th>Meter Akhir</th>
                                        <th>Jumlah Meter</th>
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