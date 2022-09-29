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
                                        <a href="{{ url('supervisor/konseling') }}">
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
                                        <td class="text-sm-end">Hari Pelaksanaan</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $konseling->surat_hari }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Tanggal Surat</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $konseling->waktu_tanggal }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Nama Konselor</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $konseling->nama_konselor }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Jabatan Konselor</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $konseling->jabatan_konselor }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Nama Pegawai</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $konseling->nama_pegawai }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Jabatan Pegawai</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $konseling->jabatan->nama }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Area Pegawai</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $konseling->area->nama }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Hasil Konseling</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $konseling->hasil_konseling }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-footer">
                                <a href="{{ url("supervisor/konseling")}}/{{ $konseling->idKonseling }}/edit" class="btn btn-sm btn-primary float-end">unduh</a>
                                {{-- karena pake route web resource, dibuat sama semua urlnya. Ini otomatis ke halaman form --}}
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