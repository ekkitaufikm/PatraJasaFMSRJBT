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
                                        <a href="{{ url('admin/manpower') }}">
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
                            <form action="{{ url("$url/update")}}" method="POST" enctype="multipart/form-data">
                                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                                @csrf 
                                @method('PUT')
                                {{-- <input type="text" name="e" >
                                <input type="submit" > --}}
                
                                <div class="card-body">
                                    <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $manpower->id }}">
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Nama Lengkap</label>
                                        <input name="nama" class="form-control" type="text" value="{{ $manpower->nama }}">
                                        {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Nopeg</label>
                                        <input name="nip" class="form-control" type="text" value="{{ $manpower->nip }}">
                                        {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Agama</label>
                                        <input type="hidden" name="idAgama" value="{{ $manpower->idAgama }}">
                                        <select id="select-sem" class="form-select select2" name="idAgama" aria-label="Default select example" required>
                                            <option value="">Pilih Agama</option>
                                            @foreach ($agama as $r) 
                                                <option value="{{ $r->idAgama }}" {{ $r->idAgama == $manpower->idAgama ? 'selected' : '' }}>{{ $r->nama }}</option>
                                            @endforeach
                                        </select >
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Jenis Kelamin</label>
                                        <input type="hidden" name="idKelamin" value="{{ $manpower->idKelamin }}">
                                        <select id="select-sem" class="form-select select2" name="idKelamin" aria-label="Default select example" required>
                                            <option value="">Pilih Kelamin</option>
                                            @foreach ($jenis_kelamin as $r) 
                                                <option value="{{ $r->idKelamin }}" {{ $r->idKelamin == $manpower->idKelamin ? 'selected' : '' }}>{{ $r->nama }}</option>
                                            @endforeach
                                        </select >
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Jabatan</label>
                                        <input type="hidden" name="idJabatan" value="{{ $manpower->idJabatan }}">
                                        <select id="select-sem" class="form-select select2" name="idJabatan" aria-label="Default select example" required>
                                            <option value="">Pilih Jabatan</option>
                                            @foreach ($jabatan as $r) 
                                                <option value="{{ $r->idJabatan }}" {{ $r->idJabatan == $manpower->idJabatan ? 'selected' : '' }}>{{ $r->nama }}</option>
                                            @endforeach
                                        </select >
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Nama Supervisor</label>
                                        <input name="idUsers" class="form-control" type="text" disabled value="{{ $manpower->users->nama }}">
                                        {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Area</label>
                                        <input type="hidden" name="idArea" value="{{ $manpower->idArea }}">
                                        <select id="select-sem" class="form-select select2" name="idArea" aria-label="Default select example" required>
                                            <option value="">Pilih Area</option>
                                            @foreach ($area as $r) 
                                                <option value="{{ $r->idArea }}" {{ $r->idArea == $manpower->idArea ? 'selected' : '' }}>{{ $r->nama}}</option>
                                            @endforeach
                                        </select >
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Status</label>
                                        <input type="hidden" name="idStatus" value="{{ $manpower->idStatus }}">
                                        <select id="select-sem" class="form-select select2" name="idStatus" aria-label="Default select example" required>
                                            <option value="">Pilih Status</option>
                                            @foreach ($status as $r) 
                                                <option value="{{ $r->idStatus }}" {{ $r->idStatus == $manpower->idStatus ? 'selected' : '' }}>{{ $r->nama }}</option>
                                            @endforeach
                                        </select >
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Role</label>
                                        <input type="hidden" name="idRole" value="{{ $manpower->idRole }}">
                                        <select id="select-sem" class="form-select select2" name="idRole" aria-label="Default select example" required>
                                            <option value="">Pilih Role</option>
                                            @foreach ($role as $r) 
                                                <option value="{{ $r->idRole }}" {{ $r->idRole == $manpower->idRole ? 'selected' : '' }}>{{ $r->nama }}</option>
                                            @endforeach
                                        </select >
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0">Foto</label>
                                        <input type="hidden" name="oldImage" value="{{ $manpower->foto }}">
                                        @if ($manpower->foto)
                                            <img src="{{ asset('upload/foto/' . $manpower->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">                                   
                                        @else
                                            <img class="img-preview img-fluid mb-3 col-sm-5">                    
                                        @endif
                                        <input class="form-control" type="file" id="photo" name="photo" onchange="previewImage()">
                                        <span class="form-text fs-6 text-muted">Max file size is 1MB per file.</span>
                                        {{-- <input type="file" class="form-control mb-2" name> --}}
                                        {{-- penempatan name selalu sebelah input ya, biar gampang di cek --}}
                                    </div>
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