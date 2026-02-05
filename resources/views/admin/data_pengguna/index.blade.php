@extends('layout.app')

@section('title', 'Data Pengguna')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Pengguna</h3>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('admin.data_pengguna.tambah') }}" class="btn btn-primary float-sm-end">
                        <i class="bi bi-plus-circle"></i> Tambah Data
                    </a>
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
                            <table id="mytable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 40px">No.</th>
                                        <th>Username</th>
                                        <th>Nama Pengguna</th>
                                        <th>Alamat</th>
                                        <th>Nomor KwH</th>
                                        <th style="width: 100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pelanggans as $index => $pelanggan)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $pelanggan->username }}</td>
                                        <td>{{ $pelanggan->nama_pelanggan }}</td>
                                        <td>{{ $pelanggan->alamat }}</td>
                                        <td>{{ $pelanggan->nomor_kwh }}</td>
                                        <td>
                                            <a href="{{ route('admin.data_pengguna.edit', $pelanggan->id_pelanggan) }}"
                                                class="btn btn-sm btn-primary btn-edit">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>
                                            <form
                                                action="{{ route('admin.data_pengguna.delete', $pelanggan->id_pelanggan) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger "
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
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

</main>
@endsection