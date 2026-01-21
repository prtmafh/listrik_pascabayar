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
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Petugas</li>
                    </ol>
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
                            <div class="mb-3 text-end">
                                <button class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Tambah Data
                                </button>
                            </div>
                            <table id="mytable" class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Username</th>
                                        <th>Nama Petugas</th>
                                        <th style="width: 40px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>


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
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new DataTable('#mytable', {
            autoWidth: false,
            columnDefs: [{
                    width: '50px',
                    targets: 0
                },
                {
                    width: '200px',
                    targets: 1
                },
                {
                    width: '250px',
                    targets: 2
                },
                {
                    width: '100px',
                    targets: 3
                }
            ]
        });
    });
</script>

@endpush