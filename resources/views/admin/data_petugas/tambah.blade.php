@extends('layout.app')

@section('title', 'Tambah Data Petugas')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Data Petugas</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.data_petugas')}}">Data Petugas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Petugas</li>
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
                            <div class="card-title">Form Tambah Data Petugas</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('admin.data_petugas.tambah.post') }}">
                            @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="nama_admin" class="form-label">Nama Petugas</label>
                                    <input type="text" class="form-control" name="nama_admin" />
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Usernam</label>
                                    <input type="text" class="form-control" name="username" />
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" />
                                </div>
                                <input type="hidden" name="id_level" value="2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
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