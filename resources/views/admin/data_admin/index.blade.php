@extends('layout.app')

@section('title', 'Data Admin')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Admin</h3>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('admin.data_admin.tambah') }}" class="btn btn-primary float-sm-end">
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
                            <div class="mb-3 text-end">

                            </div>
                            <table id="mytable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 40px">No.</th>
                                        <th>Nama Admin</th>
                                        <th>Username</th>
                                        <th style="width: 100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $i => $admin)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td class="text-capitalize">{{ $admin->nama_admin }}</td>
                                        <td>{{ $admin->username }}</td>
                                        <td>
                                            <a href="{{ route('admin.data_admin.edit', $admin->id_user) }}"
                                                class="btn btn-sm btn-primary btn-edit">

                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('admin.data_admin.delete', $admin->id_user) }}"
                                                class="btn btn-sm btn-danger btn-delete"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="bi bi-trash"></i>
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
</main>
@endsection