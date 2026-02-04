@extends('layout.app')

@section('title', 'Tambah Data Pengguna')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Data Pengguna</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.data_pengguna')}}">Data Pengguna</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Pengguna</li>
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
                            <div class="card-title">Form Tambah Data Pengguna</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('admin.data_pengguna.tambah.post') }}">
                            @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama_pelanggan" class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" />
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" />
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_kwh" class="form-label">Nomor KwH</label>
                                    <input type="text" class="form-control" id="nomor_kwh" name="nomor_kwh" />
                                </div>
                                <div class="mb-3">
                                    <label for="id_tarif" class="form-label">Daya Listrik</label>
                                    <select class="form-control" id="id_tarif" name="id_tarif">
                                        <option value="" disabled selected>Pilih Daya Listrik</option>
                                        @foreach ($tarif as $t)
                                        <option value="{{ $t->id_tarif }}">{{ $t->daya }} VA - Rp {{ number_format($t->tarifperkwh, 0, ',', '.') }} per Kwh</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" />
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" />
                                </div>
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