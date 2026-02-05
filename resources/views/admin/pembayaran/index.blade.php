@extends('layout.app')

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
                        <li class="breadcrumb-item"><a href="{{route('admin.data_pengguna')}}">Laporan Pembayaran</a>
                        </li>
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
                    <div class="card shadow-sm">
                        <div class="card-header bg-dark text-white">Form Pembayaran Tagihan</div>
                        <div class="card-body">
                            <form action="{{ route('pembayaran.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_tagihan" value="{{ $tagihan->id_tagihan }}">

                                <div class="mb-3">
                                    <label>Nama Pelanggan</label>
                                    <input type="text" class="form-control text-capitalize"
                                        value="{{ $tagihan->pelanggan->nama_pelanggan }}" disabled>
                                </div>

                                <div class="mb-3">
                                    <label>No KWH</label>
                                    <input type="text" class="form-control" value="{{ $tagihan->pelanggan->nomor_kwh }}"
                                        disabled>
                                </div>

                                <div class="mb-3">
                                    <label>Daya</label>
                                    <input type="text" class="form-control"
                                        value="{{ $tagihan->pelanggan->tarif->daya ?? '-' }} VA" disabled>
                                </div>

                                <div class="mb-3">
                                    <label>Jumlah Meter</label>
                                    <input type="text" class="form-control" value="{{ $tagihan->jumlah_meter }} kWh"
                                        disabled>
                                </div>

                                @php
                                $jumlah_meter = $tagihan->jumlah_meter;
                                $tarif = $tagihan->pelanggan->tarif->tarifperkwh ?? 0;
                                $total_tagihan = $jumlah_meter * $tarif;
                                @endphp

                                <div class="mb-3">
                                    <label>Total Tagihan</label>
                                    <input type="text" class="form-control"
                                        value="Rp {{ number_format($total_tagihan, 2, ',', '.') }}" disabled>
                                </div>

                                <div class="mb-3">
                                    <label>Biaya Admin</label>
                                    <input type="number" name="biaya_admin" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="date" name="tanggal_pembayaran" class="form-control"
                                        value="{{ now()->toDateString() }}" required>
                                </div>

                                <button type="submit" class="btn btn-success">Simpan Pembayaran</button>
                                <a href="{{ route('admin.tagihan') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection