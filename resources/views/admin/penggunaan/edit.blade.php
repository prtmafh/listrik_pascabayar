@extends('admin.layout.app')

@section('title', 'Input Meter')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Input Meter Akhir</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.penggunaan')}}">Data Penggunaan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Meter Akhir</li>
                    </ol>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!--begin::Quick Example-->
                    <div class="card card-primary card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Form Input Meter Akhir</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form>
                            <!--begin::Body-->
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Pelanggan</label>
                                                <input type="text" class="form-control" value="" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">No KWH</label>
                                                <input type="text" class="form-control" value="" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Bulan</label>
                                                <input type="text" class="form-control" value="" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tahun</label>
                                                <input type="text" class="form-control" value="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Meter Awal</label>
                                                <input type="text" class="form-control" value="" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Meter Akhir</label>
                                                <input type="number" name="meter_akhir" class="form-control" value="" required min="">
                                                <small class="form-text text-muted">Meter akhir harus lebih besar dari meter awal</small>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Meter (Otomatis)</label>
                                                <input type="text" class="form-control" id="jumlah_meter" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Quick Example-->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection