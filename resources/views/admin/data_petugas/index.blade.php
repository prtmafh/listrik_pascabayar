@extends('layout.app')

@section('title', 'Data Petugas')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Petugas</h3>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('admin.data_petugas.tambah') }}" class="btn btn-primary float-sm-end">
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
                            <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px;">No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th style="width: 100px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $i => $admin)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td class="text-capitalize">{{ $admin->nama_admin }}</td>
                                            <td>{{ $admin->username }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary btn-edit">

                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a type="button" class="btn btn-sm btn-danger btn-delete"
                                                    data-id="{{ $admin->id_user }}">
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
    </div>
</main>
@endsection