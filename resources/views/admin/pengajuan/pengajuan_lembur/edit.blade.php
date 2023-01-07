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
                                        <a href="{{ url('admin/pengajuan_lembur') }}">
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
                            <form action="{{ url('admin/pengajuan_lembur') }}/{{ $pengajuan_lembur->idPLembur }}" method="POST">
                                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                                @csrf 
                                @method('PUT') 
                                {{-- <input type="text" name="e" >
                                <input type="submit" > --}}
                
                                <div class="card-body">
                                    @if ($pengajuan_lembur->status == 1)
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">No Surat</label>
                                            <input name="no_surat" class="form-control" type="text" placeholder="Masukkan No Surat">
                                            {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Supervisor</label>
                                            <input name="supervisor" class="form-control" type="text" placeholder="Masukkan Nama Supervisor">
                                            {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Tindakan</label>
                                            <select id="select-sem" class="form-select select2" name="status" aria-label="Default select example" required>
                                                <option value="">Pilih Tindakan</option>
                                                    <option value="2">Revisi</option>
                                                    <option value="3">Disetujui</option>
                                            </select >
                                        </div>
                                    @elseif ($pengajuan_lembur->status == 2)
                                        <input type="hidden" id="i-nama" class="form-control" name="idPLembur" value="{{ $pengajuan_lembur->idPLembur }}">
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Nama Lengkap</label>
                                            <input name="nama" class="form-control" type="text" value="{{ $pengajuan_lembur->namaPegawai }}">
                                            {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Nopeg</label>
                                            <input name="nip" class="form-control" type="text" value="{{ $pengajuan_lembur->nip }}">
                                            {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Area</label>
                                            <select id="select-sem" class="form-select select2" name="idArea" aria-label="Default select example" required>
                                                <option value="">Pilih Area</option>
                                                @foreach ($area as $r) 
                                                    <option value="{{ $r->idArea }}">{{ $r->nama }}</option>
                                                @endforeach
                                            </select >
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Jabatan</label>
                                            <select id="select-sem" class="form-select select2" name="idJabatan" aria-label="Default select example" required>
                                                <option value="">Pilih Jabatan</option>
                                                @foreach ($jabatan as $r) 
                                                    <option value="{{ $r->idJabatan }}">{{ $r->nama }}</option>
                                                @endforeach
                                            </select >
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Tempat Pengajuan</label>
                                            <input name="surat_tempat" class="form-control" type="text" value="{{ $pengajuan_lembur->surat_tempat }}">
                                            {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Tanggal Pengajuan</label>
                                            <input name="waktu_tanggal" class="form-control" type="text" value="{{ $pengajuan_lembur->waktu_tanggal }}">
                                            {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Mulai Dari</label>
                                            <input name="waktu_dari" class="form-control" type="text" value="{{ $pengajuan_lembur->waktu_dari }}">
                                            {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Selesai Pukul</label>
                                            <input name="waktu_sampai" class="form-control" type="text" value="{{ $pengajuan_lembur->waktu_sampai }}">
                                            {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label pt-0">Pekerjaan yang Dilemburkan</label>
                                            <input name="namaPekerjaan" class="form-control" type="text" value="{{ $pengajuan_lembur->namaPekerjaan }}">
                                            {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </div>
                            </form>
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