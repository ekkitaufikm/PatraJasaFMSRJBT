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
                                        <a href="{{ url('admin/pengajuan_izin') }}">
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
                                        <td class="text-sm-start">{{ $pengajuan_izin->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Nopeg</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pengajuan_izin->nip }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Area</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pengajuan_izin->area->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Supervisor</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pengajuan_izin->supervisor ?? 'Data Belum Diverifikasi' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Tempat</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pengajuan_izin->surat_tempat }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Tanggal</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pengajuan_izin->surat_waktu }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Jabatan</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pengajuan_izin->jabatan->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Maksud</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pengajuan_izin->isian_alasan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Keluar Jam</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pengajuan_izin->isian_keluar }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm-end">Masuk Jam</td>
                                        <td>:</td>
                                        <td class="text-sm-start">{{ $pengajuan_izin->isian_masuk }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @if ($pengajuan_izin->status == 3)
                                <div class="card-footer">
                                    <form action="{{ url('admin/pengajuan_izin') }}" method="POST">
                                        {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $pengajuan_izin->idPIzin }}"> 
                                        <input type="submit" class="btn btn-primary" value="unduh">
                                    </form>
                                    {{-- karena pake route web resource, dibuat sama semua urlnya. Ini otomatis ke halaman form --}}
                            @endif
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