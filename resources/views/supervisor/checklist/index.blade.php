@extends($supervisor)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder my-1 fs-2">{{ $page }}</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb fw-bold fs-base my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('supervisor/dashboard') }}" class="text-muted text-hover-primary">Home</a>
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
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th>No</th>
                                        <th class="min-w-125px">Nama Item</th>
                                        <th class="min-w-125px">Pukul</th>
                                        <th class="min-w-125px">Dibersihkan</th>
                                        <th class="min-w-125px">Nama Man Power</th>
                                        <th class="min-w-125px">Supervisor</th>
                                        <th class="min-w-125px">Status</th>
                                        <th class="min-w-125px">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach ($checklist as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->item }}</td>
                                            <td>{{ $p->pukul }}</td>
                                            <td>{{ $p->bersihan }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->users->nama }}</td>
                                            <td>
                                                @if ($p->status == 1)
                                                    <span class="badge badge-light-primary">Dalam Proses</span>    
                                                @elseif ($p->status == 2)
                                                <span class="badge badge-light-warning me-auto">Revisi</span>
                                                @elseif ($p->status == 3)
                                                <span class="badge badge-light-success me-auto">Sukses</span>
                                                @endif
                                            </td>      
                                            <td>
                                                @if ($p->status == 1)
                                                <a href="{{ url('supervisor/checklist') }}/{{ $p->id }}/edit" class="btn btn-primary" title="Detail">Verifikasi</a>
                                                <a href="{{ url("$url/" . $p->id, []) }}" class="btn btn-primary" title="Detail">Detail</a>
                                                @elseif ($p->status == 2)
                                                <a href="{{ url('supervisor/checklist') }}/{{ $p->id }}/edit" class="btn btn-primary" title="Revisi">Revisi</a>
                                                @elseif ($p->status == 3)
                                                <a href="{{ url("$url/" . $p->id, []) }}" class="btn btn-primary" title="Detail">Detail</a>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
        <!--end::Post-->
    </div>
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
{{-- Tempat Ngoding Meletakkan js custom --}}
@endsection