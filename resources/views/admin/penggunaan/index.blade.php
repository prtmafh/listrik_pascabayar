@extends('layout.app')

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
                        <input type="text" name="tahun" class="form-control w-auto" placeholder="Tahun (misal: 2025)"
                            required>

                        <form action="{{ route('penggunaan.generate') }}" method="POST" class="">
                            @csrf
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-plus-circle"></i> Generate Penggunaan Bulan Ini
                            </button>
                        </form>
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
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Meter Awal</th>
                                            <th>Meter Akhir</th>
                                            <th>Pemakaian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pelanggan->nomor_kwh }}</td>
                                            <td class="text-capitalize">{{ $item->pelanggan->nama_pelanggan }}</td>
                                            <td>{{ $item->bulan }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td>{{ $item->meter_awal }} kWh</td>
                                            <td>{{ $item->meter_akhir ?? '-' }} kWh</td>
                                            <td>
                                                @if($item->meter_akhir !== null)
                                                {{ $item->meter_akhir - $item->meter_awal }}
                                                @else -
                                                @endif
                                                kWh
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.penggunaan.edit', ['id' => 1]) }}"
                                                    class="btn btn-sm btn-primary btn-edit">
                                                    <i class="bi bi-pencil-square"></i>
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