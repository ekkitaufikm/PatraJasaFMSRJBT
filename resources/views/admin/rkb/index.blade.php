@extends($admin)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    <!--begin::Content-->
    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
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
                                    <h1 class="text-dark fw-bolder my-1 fs-2">{{ $page }}</h1>
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!--begin::Add user-->
                                    <button type="button" class="btn btn-primary">
                                        <a href="{{ url('admin/rkb') }}/create">
                                            <i class="fa fa-plus-square text-white text-active-primary"></i>
                                            <span class="text-light text-hover-primary">Tambah</span>
                                        </a>
                                    </button>
                                    <!--end::Add user-->
                                </div>
                                <!--end::Toolbar-->
                                
                            </div>
                            <!--end::Card toolbar-->
                            
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4">
                            <div class="table-responsive" id="tabel-jquery">
                                <!--begin::Table-->
                                <table id="isi-tabel" class="table align-middle table-row-dashed fs-6 gy-5" >
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th>No</th>
                                            <th class="min-w-125px">Tanggal Upload</th>
                                            <th class="min-w-125px">Nama Supervisor</th>
                                            <th class="min-w-125px">Area</th>
                                            <th class="min-w-125px">File</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @foreach ($rkb as $p)
                                        <tr>
                                            
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->created_at }}</td>
                                            <td>{{ $p->users->nama }}</td>
                                            <td>{{ $p->area->nama }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">
                                                    <a href="{{ url('upload/excel/rkb/') }}/{{$p->nama }}">
                                                        <span class="text-light text-hover-primary">Download</span>
                                                    </a>
                                                </button>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
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