@extends('layout.app')

@section('title', 'Tagihan Listrik')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">Data Tagihan Listrik</h3>
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
                        <input type="text" name="tahun" class="form-control w-auto" placeholder="Tahun (misal: 2025)"
                            required>

                        <a href="#" class="btn btn-warning">
                            <i class="bi bi-gear"></i> Generate Tagihan
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
                                        <th>Daya</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Meter Awal</th>
                                        <th>Meter Akhir</th>
                                        <th>Pemakaian</th>
                                        <th>Total Bayar</th>
                                        <th>Status</th>
                                        <th class="text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center ">1</td>
                                        <td>1234567890</td>
                                        <td>Andi</td>
                                        <td>1300 VA</td>
                                        <td>Januari</td>
                                        <td>2024</td>
                                        <td>1000</td>
                                        <td>1200</td>
                                        <td>200</td>
                                        <td>Rp 300.000,-</td>
                                        <td><span class="badge bg-danger">Belum Bayar</span></td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalBayar" title="Bayar Tagihan">
                                                <i class="bi bi-currency-dollar"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalBayar" tabindex="-1"
                                                aria-labelledby="modalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel">Pembayaran
                                                                    Tagihan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Nama Pelanggan</label>
                                                                    <input type="text" class="form-control" value=""
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">No KWH</label>
                                                                    <input type="text" class="form-control" value=""
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Daya</label>
                                                                    <input type="text" class="form-control" value=""
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Meter Awal</label>
                                                                    <input type="text" class="form-control" value=""
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Meter Akhir</label>
                                                                    <input type="text" class="form-control" value=""
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Jumlah Meter</label>
                                                                    <input type="text" class="form-control" value=""
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Tarif per KWH</label>
                                                                    <input type="text" class="form-control" value="Rp "
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Total Tagihan</label>
                                                                    <input type="text" class="form-control" value="Rp "
                                                                        readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Biaya Admin</label>
                                                                    <input type="number" name="biaya_admin"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Tanggal Pembayaran</label>
                                                                    <input type="date" name="tanggal_bayar"
                                                                        class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">Bayar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>


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