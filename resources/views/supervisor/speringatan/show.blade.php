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
                                        <a href="{{ url('supervisor/surat_peringatan') }}">
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
                                        <td class="text-sm-end">Tempat Surat</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->surat_tempat }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Tanggal Surat</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->waktu_tanggal }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Nama Pegawai</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->nama }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Nopeg Pegawai</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->nip }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Jabatan Pegawai</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->jabatan->nama }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Area Pegawai</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->area->nama }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Jenis Peringatan</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->peringatan->nama }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Pelanggaran 1</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->pelanggaran1 }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Pelanggaran 2</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->pelanggaran2 }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Pelanggaran 3</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->pelanggaran3 }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Pelanggaran 4</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->pelanggaran4 }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Pelanggaran 5</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->pelanggaran5 }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Janji Karyawan 1</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->janji1 }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Janji Karyawan 2</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->janji2 }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm-end">Janji Karyawan 3</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $surat_peringatan->janji3 }}</td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="card-footer">
                                <a href="{{ url("supervisor/surat_peringatan")}}/{{ $surat_peringatan->idSPeringatan }}/edit" class="btn btn-sm btn-primary float-end">unduh</a>
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