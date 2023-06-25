@extends($admin)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    @php
        $tim_management     = $users->where('role', 1)->count('idUsers');
        $supervisor         = $users->where('role', 2)->count('idUsers');
        $manpower           = $man_power->where('role', 3)->count('id');
        
        $totalSemua      =$tim_management+$supervisor+$manpower;

    @endphp
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder my-1 fs-2">{{ $page }} 
                <small class="text-muted fs-6 fw-normal ms-1"></small></h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-bold fs-base my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-dark">{{ $page }}</li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class="container-xxl">
            <div class="alert alert-success font-weight-bold mb-4" style="width: 100%">Selamat datang <b>{{ session()->get('nama') }}</b>, Anda login sebagai Super Admin!</div>
            <!--begin::Row-->
            <div class="row g-xl-8">
                <!--begin::Col-->
                <div class="col-xxl-8">
                    <!--begin::Row-->
                    <div class="row g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xl-4">
                            <!--begin::Mixed Widget 13-->
                            <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #F7D9E3">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <!--begin::Title-->
                                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">Total Karyawan</a>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Stats-->
                                    <div class="pt-5">
                                        <!--begin::Number-->
                                        <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ $totalSemua }}</span>
                                        <!--end::Number-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 13-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-4">
                            <!--begin::Mixed Widget 13-->
                            <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #CBF0F4">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <!--begin::Title-->
                                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">Tim Management</a>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Stats-->
                                    <div class="pt-5">
                                        <!--begin::Number-->
                                        <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ $tim_management }}</span>
                                        <!--end::Number-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 13-->
                        </div>
                        <!--end::Col-->
                        
                        <!--begin::Col-->
                        <div class="col-xl-4">
                            <!--begin::Mixed Widget 13-->
                            <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #CBF0F4">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <!--begin::Title-->
                                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">Supervisor</a>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Stats-->
                                    <div class="pt-5">
                                        <!--begin::Number-->
                                        <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ $supervisor }}</span>
                                        <!--end::Number-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 13-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row g-xl-8">
                <!--begin::Col-->
                <div class="col-xxl-8">
                    <!--begin::Row-->
                    <div class="row g-xl-8">
                        <!--begin::Col-->
                        <div class="col-xl-4">
                            <!--begin::Mixed Widget 13-->
                            <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #CBF0F4">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <!--begin::Title-->
                                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">Man Power</a>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Stats-->
                                    <div class="pt-5">
                                        <!--begin::Number-->
                                        <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ count($man_power) }}</span>
                                        <!--end::Number-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 13-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-xl-4">
                            <!--begin::Mixed Widget 13-->
                            <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #F7D9E3">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <!--begin::Title-->
                                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">Pensiun</a>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Stats-->
                                    <div class="pt-5">
                                        <!--begin::Number-->
                                        <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ count($pensiun) }}</span>
                                        <!--end::Number-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 13-->
                        </div>
                        <!--end::Col-->
                        
                        <!--begin::Col-->
                        <div class="col-xl-4">
                            <!--begin::Mixed Widget 13-->
                            <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #CBF0F4">
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-column">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <!--begin::Title-->
                                        <a href="#" class="text-dark text-hover-primary fw-bold fs-3">Resign</a>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Stats-->
                                    <div class="pt-5">
                                        <!--begin::Number-->
                                        <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ count($resign) }}</span>
                                        <!--end::Number-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Mixed Widget 13-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
{{-- Tempat Ngoding Meletakkan js custom --}}
@endsection