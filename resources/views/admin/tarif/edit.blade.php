@extends('layout.app')

@section('title', 'Edit Tarif Listrik')
@section('content')
<main class="app-main">
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Data Tarif Listrik</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.data_petugas')}}">Tarif Listrik</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Tarif</li>
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
                            <div class="card-title">Form Edit Data Tarif Listrik</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('admin.tarif.update', $tarif->id_tarif) }}">
                            @csrf
                            @method('PUT')
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="daya" class="form-label">Daya</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="daya"
                                        name="daya"
                                        value="{{ $tarif->daya }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="tarif_per_kwh" class="form-label">Tarif per Kwh</label>
                                    <input type="text" class="form-control" id="tarif_per_kwh" name="tarifperkwh" value="{{ $tarif->tarifperkwh }}" />
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