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

        {{-- Diberikan alert --}}
        @if (session()->has('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @elseif (session()->has('gagal'))
            <div class="alert alert-danger" role="alert">
                {{ session('gagal') }}
            </div>
        @endif
        <!--begin::Post-->
        <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div class="container-xxl">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>{{ $page }}</h2>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!--begin::Add user-->
                                    <button type="button" class="btn btn-primary">
                                        <a href="{{ url('supervisor/pengajuan_cuti') }}">
                                            <span class="text-light text-hover-primary">Kembali</span>
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
                            <table id="datatable" class="table text-left">
                                <tbody>
                                    <tr>
                                        <td class="text-sm-end">Nama</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $cuti->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Nopeg</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $cuti->nip }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Area</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $cuti->area->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Tanggal Pengajuan</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $cuti->tanggal_pengajuan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Tanggal Mulai Cuti</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $cuti->tanggal_cuti }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Cuti Sampai Tanggal</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $cuti->sampai_tanggal }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Jabatan</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $cuti->jabatan->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Supervisor</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $cuti->users->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Pelimpahan Tugas</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $cuti->rekan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Alasan</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $cuti->alasan->pertanyaan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Keterangan</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $cuti->keterangan ?? 'Tidak ada keterangan' }}</td>
                                    </tr>
                                </tbody>
                            </table>
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