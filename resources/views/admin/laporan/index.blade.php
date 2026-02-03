@extends('layout.app')

@section('title', 'Laporan Pembayaran Listrik')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">Laporan Transaksi Pembayaran</h3>
                </div>
                <div class="col-sm-6">
                    <form method="GET" action="{{ route('admin.laporan') }}"
                        class="d-flex flex-wrap gap-2 justify-content-end align-items-center ">
                        <div>
                            <select name="bulan" class="form-select" style="min-width: 150px;">
                                <option value="">Pilih Bulan</option>
                                @foreach(['January','February','March','April','May','June','July','August','September','October','November','December']
                                as $b)
                                <option value="{{ $b }}" {{ request('bulan')==$b ? 'selected' : '' }}>{{ $b }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <input type="number" name="tahun" value="{{ request('tahun') }}" class="form-control"
                                placeholder="Tahun" style="width: 100px;">
                        </div>
                        <div>
                            <button class="btn btn-primary"><i class="bi bi-funnel-fill me-1"></i>Filter</button>
                        </div>
                        {{-- <div>
                            <a href="{{ route('laporan.cetak', request()->all()) }}" class="btn btn-danger"
                                target="_blank">
                                <i class="bi bi-printer-fill me-1"></i>Cetak PDF
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('laporan.export', request()->all()) }}" class="btn btn-success">
                                <i class="bi bi-file-earmark-excel"></i> Export Excel
                            </a>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No KWH</th>
                                            <th>Nama</th>
                                            <th>Daya</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Meter Awal</th>
                                            <th>Meter Akhir</th>
                                            <th>Pemakaian</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pembayaran as $i => $p)
                                        @php
                                        $tagihan = $p->tagihan;
                                        $pelanggan = $tagihan?->pelanggan;
                                        $tarif = $pelanggan?->tarif;
                                        @endphp
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $pelanggan->nomor_kwh ?? '-' }}</td>
                                            <td class="text-capitalize">{{ $pelanggan->nama_pelanggan ?? '-' }}</td>
                                            <td>{{ $tarif->daya ?? '-' }} VA</td>
                                            <td>{{ $tagihan->bulan ?? '-' }}</td>
                                            <td>{{ $tagihan->tahun ?? '-' }}</td>
                                            <td>{{ $tagihan->penggunaan->meter_awal ?? '-' }} kWh</td>
                                            <td>{{ $tagihan->penggunaan->meter_akhir ?? '-' }} kWh</td>
                                            <td>{{ $tagihan->jumlah_meter ?? '-' }} kWh</td>
                                            <td>Rp {{ number_format($p->total_bayar ?? 0, 0, ',', '.') }}</td>
                                            <td>
                                                <span class="badge bg-success">{{ $tagihan->status ?? '-' }}</span>
                                            </td>
                                            <td>
                                                {{-- <a href="{{ route('pembayaran.struk', $p->id_pembayaran) }}" --}}
                                                    <a href="#" class="btn btn-sm btn-outline-secondary"
                                                    target="_blank">
                                                    <i class="bi bi-receipt"></i> Struk
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
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