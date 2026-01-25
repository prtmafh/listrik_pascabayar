@extends('admin.layout.app')

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
                                            <th class="text-center" style="width: 40px">No.</th>
                                            <th>Username</th>
                                            <th>Nama Petugas</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>beni</td>
                                            <td>Beni</td>
                                            <td class="text-end">
                                                <a href="{{ route('admin.data_petugas.edit', 1) }}" class="btn btn-sm btn-primary btn-edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger btn-delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
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