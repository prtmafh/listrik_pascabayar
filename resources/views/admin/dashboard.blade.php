@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">

                @php
                $level = Auth::user()->id_level;
                @endphp

                {{-- Jika Admin --}}
                @if ($level == 1)
                <!-- Jumlah Pelanggan -->
                <div class="col-lg-3 col-12 mb-3">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>{{ $jumlahPelanggan ?? 0 }}</h3>
                            {{-- <h3>2000</h3> --}}
                            <p>Total Pelanggan</p>
                        </div>
                        <i class="small-box-icon bi bi-person-lines-fill"></i>
                        <a href="{{route('admin.data_pengguna')}}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    </div>
                </div>

                <!-- Jumlah Petugas -->
                <div class="col-lg-3 col-12 mb-3">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{ $jumlahPetugas ?? 0 }}</h3>
                            <p>Total Petugas</p>
                        </div>
                        <i class="small-box-icon bi bi-person-badge-fill"></i>
                        <a href="{{ route('admin.data_petugas') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    </div>
                </div>

                <!-- Tagihan Bulan Ini -->
                <div class="col-lg-3 col-12 mb-3">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>{{ $jumlahTagihan ?? 0 }}</h3>
                            {{-- <h3>1000</h3> --}}
                            <p>Tagihan Bulan Ini</p>
                        </div>
                        <i class="small-box-icon bi bi-receipt-cutoff"></i>
                        <a href="{{route('admin.tagihan')}}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    </div>
                </div>

                <!-- Pembayaran Sukses -->
                <div class="col-lg-3 col-12 mb-3">
                    <div class="small-box text-bg-danger">
                        <div class="inner">
                            <h3>{{ $jumlahPembayaran ?? 0 }}</h3>
                            {{-- <h3>500</h3> --}}
                            <p>Pembayaran Sukses</p>
                        </div>
                        <i class="small-box-icon bi bi-cash-stack"></i>
                        <a href="{{route('admin.laporan')}}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    </div>
                </div>
                @endif

                {{-- Jika Petugas --}}
                @if ($level == 2)
                <!-- Penggunaan -->
                {{-- <div class="col-lg-4 col-12 mb-3">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>{{ $jumlahPenggunaan ?? 0 }}</h3>
                            <h3>2000</h3>
                            <p>Total Penggunaan</p>
                        </div>
                        <i class="small-box-icon bi bi-lightning-charge"></i>
                        <a href="{{route('dashboard.penggunaan')}}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    </div>
                </div> --}}

                <!-- Tagihan Bulan Ini -->
                <div class="col-lg-4 col-12 mb-3">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>{{ $jumlahTagihan ?? 0 }}</h3>
                            {{-- <h3>1000</h3> --}}
                            <p>Tagihan Bulan Ini</p>
                        </div>
                        <i class="small-box-icon bi bi-receipt-cutoff"></i>
                        <a href="{{route('admin.tagihan')}}"
                            class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                            Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    </div>
                </div>

                <!-- Pembayaran -->
                <div class="col-lg-4 col-12 mb-3">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{ $jumlahPembayaran ?? 0 }}</h3>
                            {{-- <h3>500</h3> --}}
                            <p>Total Pembayaran</p>
                        </div>
                        <i class="small-box-icon bi bi-cash-stack"></i>
                        <a href="{{route('admin.laporan')}}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            Lihat Detail <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</main>
@endsection