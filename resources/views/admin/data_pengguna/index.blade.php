@extends('admin.layout.app')

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
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
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
                                <a href="{{ route('admin.data_pengguna.tambah') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Tambah Data
                                </a>
                            </div>
                            <table id="mytable" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center " style="width: 40px">No.</th>
                                        <th>Username</th>
                                        <th>Nama Pengguna</th>
                                        <th>Alamat</th>
                                        <th>Nomor KwH</th>
                                        <th class="text-end">Aksi</th>
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
    // document.addEventListener('DOMContentLoaded', function() {
    //     new DataTable('#mytable', {
    //         autoWidth: false,
    //         columnDefs: [{
    //                 width: '50px',
    //                 targets: 0
    //             },
    //             {
    //                 width: '200px',
    //                 targets: 1
    //             },
    //             {
    //                 width: '200px',
    //                 targets: 2
    //             },
    //             {
    //                 width: '200px',
    //                 targets: 3
    //             },
    //             {
    //                 width: '200px',
    //                 targets: 4
    //             },
    //             {
    //                 width: '100px',
    //                 targets: 5
    //             }
    //         ]
    //     });
    // });
</script>

@endpush