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
                        {{-- <select name="bulan" class="form-control w-auto text-muted" required>
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
                            required> --}}

                        @if (Auth::guard('web')->check())
                        @php $level = Auth::user()->id_level; @endphp
                        @if ($level == 1)
                        <form action="{{ route('tagihan.generate') }}" method="POST" class="">
                            @csrf
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-plus-circle"></i> Generate Tagihan Bulan Ini
                            </button>
                        </form>
                        @endif
                        @endif
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
                <div class="col-md-12">


                    <div class="card shadow-sm">
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No KWH</th>
                                            <th>Nama</th>
                                            <th>Daya</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Pemakaian</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                            <th>Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pelanggan->nomor_kwh }}</td>
                                            <td class="text-capitalize">{{ $item->pelanggan->nama_pelanggan }}</td>
                                            <td>{{ $item->pelanggan->tarif->daya ?? '-' }} VA</td>
                                            <td>{{ $item->bulan }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td>{{ $item->jumlah_meter }} kWh</td>
                                            <td>Rp {{ number_format($item->jumlah_meter *
                                                $item->pelanggan->tarif->tarifperkwh,
                                                2, ',', '.') }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->status == 'sudah bayar' ? 'bg-success' : 'bg-warning text-dark' }}">
                                                    {{ ucfirst($item->status) }}
                                                </span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                                            <td>
                                                @if($item->status == 'belum bayar')
                                                <a href="{{ route('admin.pembayaran', $item->id_tagihan) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="bi bi-cash-coin"></i>
                                                </a>

                                                @else
                                                <button class="btn btn-sm btn-secondary" disabled>
                                                    <i class="bi bi-check-circle"></i>
                                                </button>
                                                {{-- <a
                                                    href="{{ route('pembayaran.struk', $item->pembayaran->id_pembayaran) }}"
                                                    class="btn btn-sm btn-outline-secondary" target="_blank">
                                                    <i class="bi bi-receipt"></i> Struk
                                                </a> --}}
                                                @endif
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